<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Wishlist;
use App\Models\Seo;
use App\Models\HomeBanner;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $homeBanners = HomeBanner::latest()->get();
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

        $productreview = ProductReview::with('user')
        ->where('is_approved', true)
        ->whereHas('user')
        ->latest()
        ->take(5)
        ->get();

        $homepage = Seo::latest()->first();

        $seo_data['seo_title'] = $homepage->seo_title_home ?? 'Pink City — Handicraft & Wedding Props';
        $seo_data['seo_description'] = $homepage->seo_des_home ?? '';
        $seo_data['keywords'] = $homepage->seo_key_home ?? '';
        $canocial = url('/');

        return view('index', compact('homeBanners', 'categories', 'bestSelling', 'flashSale', 'wishlistedIds', 'seo_data', 'canocial', 'productreview'));
    }
}
