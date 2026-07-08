<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Step 1 — Delivery Address page
    public function index()
    {
        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(fn ($i) => $i->product->price * $i->quantity);
        $total = $cartItems->sum(fn ($i) => $i->product->sale_price * $i->quantity);
        $discount = $subtotal - $total;

        $savedAddress = UserAddress::where('user_id', auth()->id())->where('is_default', true)->first()
            ?? UserAddress::where('user_id', auth()->id())->latest()->first();

        return view('checkout', compact('cartItems', 'subtotal', 'discount', 'total', 'savedAddress'));
    }

    // Step 1 submit — address save karo, payment page pe jao
    public function saveAddress(Request $request)
    {
        $request->validate([
            'address_type' => 'required|in:home,work',
            'full_name' => 'required|string|max:255',
            'country_code' => 'required|string',
            'mobile' => 'required|string|max:20',
            'pincode' => 'required|string|max:10',
            'address' => 'required|string|max:500',
            'landmark' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
        ]);

        $address = UserAddress::updateOrCreate(
            ['user_id' => auth()->id(), 'type' => $request->address_type],
            [
                'full_name' => $request->full_name,
                'country_code' => $request->country_code,
                'mobile' => $request->mobile,
                'pincode' => $request->pincode,
                'address' => $request->address,
                'landmark' => $request->landmark,
                'city' => $request->city,
                'state' => $request->state,
                'is_default' => $request->has('save_address'),
            ]
        );

        session(['checkout_address_id' => $address->id]);

        return redirect()->route('payment');
    }

    // Step 2 — Payment Options page
    public function payment()
    {
        $addressId = session('checkout_address_id');

        if (!$addressId) {
            return redirect()->route('checkout')->with('error', 'Please add delivery address first.');
        }

        $address = UserAddress::where('user_id', auth()->id())->findOrFail($addressId);

        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(fn ($i) => $i->product->price * $i->quantity);
        $total = $cartItems->sum(fn ($i) => $i->product->sale_price * $i->quantity);
        $discount = $subtotal - $total;
        $shippingCharge = $total >= 999 ? 0 : 99;
        $grandTotal = $total + $shippingCharge;
        $amountLeftForFreeShipping = max(0, 999 - $total);

        return view('payment', compact(
            'cartItems', 'subtotal', 'discount', 'total', 'address',
            'shippingCharge', 'grandTotal', 'amountLeftForFreeShipping'
        ));
    }
}
