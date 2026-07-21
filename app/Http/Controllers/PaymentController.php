<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    private function cashfreeBaseUrl()
    {
        return config('services.cashfree.env') === 'production'
            ? 'https://api.cashfree.com/pg'
            : 'https://sandbox.cashfree.com/pg';
    }

    private function cashfreeHeaders()
    {
        return [
            'x-client-id' => config('services.cashfree.app_id'),
            'x-client-secret' => config('services.cashfree.secret_key'),
            'x-api-version' => '2023-08-01',
            'Content-Type' => 'application/json',
        ];
    }

    // Order place karo — COD ho to seedha, online ho to Cashfree order banao
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
            'payment_status' => 'pending',
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

        // Online payment — Cashfree order banao
        $response = Http::withHeaders($this->cashfreeHeaders())
            ->post($this->cashfreeBaseUrl() . '/orders', [
                'order_id' => $order->order_number,
                'order_amount' => $grandTotal,
                'order_currency' => 'INR',
                'customer_details' => [
                    'customer_id' => 'user_' . auth()->id(),
                    'customer_name' => $address->full_name,
                    'customer_email' => auth()->user()->email,
                    'customer_phone' => $address->mobile,
                ],
                'order_meta' => [
                    'return_url' => route('payment.return', ['order' => $order->id]) . '?order_id={order_id}',
                    'notify_url' => route('payment.webhook'),
                ],
            ]);

        if ($response->failed()) {
            $order->update(['payment_status' => 'failed']);
            return back()->with('error', 'Unable to initiate payment. Please try again.');
        }

        $data = $response->json();

        $order->update(['razorpay_order_id' => $data['order_id']]); // yahi column reuse kar rahe hain cashfree order id ke liye

        return view('cashfree-checkout', [
            'order' => $order,
            'paymentSessionId' => $data['payment_session_id'],
            'cashfreeEnv' => config('services.cashfree.env'),
        ]);
    }

    // Cashfree se return hone ke baad yahan aata hai (return_url)
    public function returnFromCashfree(Request $request, $orderId)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($orderId);

        $response = Http::withHeaders($this->cashfreeHeaders())
            ->get($this->cashfreeBaseUrl() . '/orders/' . $order->order_number);

        if ($response->failed()) {
            return redirect()->route('payment')->with('error', 'Unable to verify payment status.');
        }

        $data = $response->json();

        if ($data['order_status'] === 'PAID') {
            $order->update(['payment_status' => 'paid']);

            CartItem::where('user_id', auth()->id())->delete();
            session()->forget('checkout_address_id');

            return redirect()->route('confirm.order', $order->id);
        }

        $order->update(['payment_status' => 'failed']);
        return redirect()->route('payment')->with('error', 'Payment was not successful. Please try again.');
    }

    // Cashfree webhook — server-to-server confirmation (extra reliability ke liye)
    public function webhook(Request $request)
    {
        $payload = $request->all();

        if (($payload['type'] ?? null) === 'PAYMENT_SUCCESS_WEBHOOK') {
            $orderNumber = $payload['data']['order']['order_id'] ?? null;

            if ($orderNumber) {
                $order = Order::where('order_number', $orderNumber)->first();

                if ($order && $order->payment_status !== 'paid') {
                    $order->update(['payment_status' => 'paid']);
                    CartItem::where('user_id', $order->user_id)->delete();
                }
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
