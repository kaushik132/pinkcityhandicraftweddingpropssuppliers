<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with(['product.category', 'product.images'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        $total = $cartItems->sum(fn($item) => $item->product->sale_price * $item->quantity);
        $discount = $subtotal - $total;

        return view('cart', compact('cartItems', 'subtotal', 'discount', 'total'));
    }

    public function add(Request $request, $productId)
    {
        $requestedQty = $request->input('quantity', 1);

        $item = CartItem::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $item->increment('quantity', $requestedQty);
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'quantity' => $requestedQty,
            ]);
        }

        $count = CartItem::where('user_id', auth()->id())->sum('quantity');

        if ($request->wantsJson()) {
            return response()->json(['status' => 'added', 'count' => $count]);
        }

        return back()->with('success', 'Product added to cart!');
    }

    public function increment($id)
    {
        $item = CartItem::where('user_id', auth()->id())->findOrFail($id);
        $item->increment('quantity');

        return $this->cartResponse($item);
    }

    public function decrement($id)
    {
        $item = CartItem::where('user_id', auth()->id())->findOrFail($id);

        if ($item->quantity > 1) {
            $item->decrement('quantity');
            return $this->cartResponse($item->fresh());
        }

        $item->delete();
        return $this->cartResponse(null);
    }

    public function remove($id)
    {
        $item = CartItem::where('user_id', auth()->id())->findOrFail($id);
        $item->delete();

        return $this->cartResponse(null);
    }

    public function clear()
    {
        CartItem::where('user_id', auth()->id())->delete();

        return redirect()->route('cart')->with('success', 'Cart cleared.');
    }


    private function cartResponse($item = null)
    {
        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();

        $subtotal = $cartItems->sum(fn($i) => $i->product->price * $i->quantity);
        $total = $cartItems->sum(fn($i) => $i->product->sale_price * $i->quantity);
        $discount = $subtotal - $total;
        $count = $cartItems->sum('quantity');

        return response()->json([
            'quantity' => $item ? $item->quantity : 0,
            'item_total' => $item ? $item->total : 0,
            'removed' => !$item,
            'count' => $count,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
        ]);
    }
}
