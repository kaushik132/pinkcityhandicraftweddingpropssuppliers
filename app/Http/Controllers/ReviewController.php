<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'city' => 'nullable|string|max:100',
            'title' => 'nullable|string|max:255',
            'review' => 'required|string|max:1000',
        ]);

        $product = Product::findOrFail($productId);

        $existing = ProductReview::where('product_id', $product->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existing) {
            return response()->json(['message' => 'You have already reviewed this product.'], 422);
        }

        ProductReview::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'city' => $request->city,
            'title' => $request->title,
            'review' => $request->review,
        ]);

        // Product ka average rating aur count update karo
        $this->recalculateProductRating($product);

        return response()->json(['success' => true, 'message' => 'Review submitted successfully!']);
    }

    private function recalculateProductRating(Product $product)
    {
        $reviews = ProductReview::where('product_id', $product->id)->where('is_approved', true);

        $product->update([
            'rating' => round($reviews->avg('rating'), 1) ?: 0,
            'reviews_count' => $reviews->count(),
        ]);
    }
}
