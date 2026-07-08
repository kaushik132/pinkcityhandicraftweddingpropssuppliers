<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with(['product.category', 'product.images'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('wishlist', compact('wishlists'));
    }

    public function add($productId)
    {
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);

        return back()->with('success', 'Product added to wishlist!');
    }

    public function remove($productId)
    {
        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->delete();

        return back()->with('success', 'Product removed from wishlist.');
    }

    public function toggle($productId)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $existing = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($existing) {
            $existing->delete();
            $status = 'removed';
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
            ]);
            $status = 'added';
        }

        $count = Wishlist::where('user_id', auth()->id())->count();

        return response()->json([
            'status'  => $status,
            'count'   => $count,
            'message' => $status
                ? 'Product added to wishlist successfully.'
                : 'Product removed from wishlist successfully.'
        ]);
    }
}
