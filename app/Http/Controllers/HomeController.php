<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Shop by Category — sirf jinme products hain
        $categories = ProductCategory::withCount('products')
            ->having('products_count', '>', 0)
            ->orderBy('name')
            ->take(6)
            ->get();

        // Best Selling — sabse zyada reviews/rating wale
        $bestSelling = Product::with(['category', 'images'])
            ->where('is_active', true)
            ->orderByDesc('reviews_count')
            ->take(6)
            ->get();

        // Flash Sale — sabse jyada discount wale products
        $flashSale = Product::with(['category', 'images'])
            ->where('is_active', true)
            ->whereColumn('sale_price', '<', 'price')
            ->orderByRaw('((price - sale_price) / price) DESC')
            ->take(6)
            ->get();

        $wishlistedIds = auth()->check()
            ? Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray()
            : [];

        return view('index', compact('categories', 'bestSelling', 'flashSale', 'wishlistedIds'));
    }
}
