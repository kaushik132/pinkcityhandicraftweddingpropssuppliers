<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    // Order place karo — COD ho to seedha, online ho to Razorpay order banao
    public function placeOrder(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:upi,card,netbanking,wallets,cod',
        ]);

        $addressId = session('checkout_address_id');
        if (!$addressId) {
            return redirect()->route('checkout')->with('error', 'Address missing.');
        }

        $address = UserAddress::where('user_id', auth()->id())->findOrFail($addressId);
        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Cart is empty.');
        }

        $subtotal = $cartItems->sum(fn ($i) => $i->product->price * $i->quantity);
        $total = $cartItems->sum(fn ($i) => $i->product->sale_price * $i->quantity);
        $discount = $subtotal - $total;
        $shippingCharge = $total >= 999 ? 0 : 99;
        $grandTotal = $total + $shippingCharge;

        $order = Order::create([
            'order_number' => 'PC-' . strtoupper(Str::random(8)),
            'user_id' => auth()->id(),
            'user_address_id' => $address->id,
            'full_name' => $address->full_name,
            'mobile' => $address->country_code . $address->mobile,
            'address' => $address->address,
            'landmark' => $address->landmark,
            'city' => $address->city,
            'state' => $address->state,
            'pincode' => $address->pincode,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shipping_charge' => $shippingCharge,
            'total' => $grandTotal,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'pending',
            'status' => 'placed',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_title' => $item->product->title,
                'product_image' => $item->product->thumbnail,
                'price' => $item->product->sale_price,
                'quantity' => $item->quantity,
                'total' => $item->product->sale_price * $item->quantity,
            ]);
        }

        // COD — seedha confirm ho jao
        if ($request->payment_method === 'cod') {
            CartItem::where('user_id', auth()->id())->delete();
            session()->forget('checkout_address_id');

            return redirect()->route('confirm.order', $order->id);
        }

        // Online payment — Razorpay order banao
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $razorpayOrder = $api->order->create([
            'receipt' => $order->order_number,
            'amount' => $grandTotal * 100, // paise mein
            'currency' => 'INR',
        ]);

        $order->update(['razorpay_order_id' => $razorpayOrder['id']]);

        return view('razorpay-checkout', [
            'order' => $order,
            'razorpayOrderId' => $razorpayOrder['id'],
            'amount' => $grandTotal * 100,
            'razorpayKey' => config('services.razorpay.key'),
        ]);
    }

    // Razorpay success callback (JS se yahan POST hoga)
    public function verify(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required',
            'razorpay_order_id' => 'required',
            'razorpay_signature' => 'required',
            'order_id' => 'required',
        ]);

        $order = Order::where('user_id', auth()->id())->findOrFail($request->order_id);

        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        try {
            $api->utility->verifyPaymentSignature([
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
            ]);

            $order->update([
                'payment_status' => 'paid',
                'razorpay_payment_id' => $request->razorpay_payment_id,
            ]);

            CartItem::where('user_id', auth()->id())->delete();
            session()->forget('checkout_address_id');

            return response()->json(['success' => true, 'redirect' => route('confirm.order', $order->id)]);

        } catch (\Exception $e) {
            $order->update(['payment_status' => 'failed']);
            return response()->json(['success' => false, 'message' => 'Payment verification failed.'], 400);
        }
    }
}
