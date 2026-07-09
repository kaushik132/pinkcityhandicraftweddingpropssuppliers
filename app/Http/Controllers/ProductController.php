<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Wishlist;
use App\Models\Seo;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
          $homepage = Seo::latest()->first();
        $categories = ProductCategory::withCount('products')->orderBy('name')->get();

        $query = Product::with(['category', 'images'])->where('is_active', true);

        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        // Price range filter — e.g. ?price=0-999 or ?price=3500-5000
        if ($request->filled('price')) {
            [$min, $max] = explode('-', $request->price);
            $query->whereBetween('sale_price', [(float) $min, (float) $max]);
        }

        // Rating filter — e.g. ?rating=4.5
        if ($request->filled('rating')) {
            $query->where('rating', '>=', $request->rating);
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('short_description', 'like', '%' . $request->search . '%')
                    ->orWhereHas('category', function ($cat) use ($request) {
                        $cat->where('name', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // Sorting
        switch ($request->get('sort', 'popular')) {
            case 'price_low':
                $query->orderBy('sale_price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('sale_price', 'desc');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            default:
                $query->orderBy('reviews_count', 'desc'); // "popular"
        }

        $products = $query->paginate(12)->withQueryString();

          $seo_data['seo_title'] = $homepage->seo_title_products ?? 'Shop Handicrafts & Wedding Props — Pink City';
    $seo_data['seo_description'] = $homepage->seo_des_products ?? '';
    $seo_data['keywords'] = $homepage->seo_key_products ?? '';
    $canocial = url('/products');


        $wishlistedIds = auth()->check()
            ? Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray()
            : [];

        return view('products', compact('categories', 'products', 'wishlistedIds', 'seo_data', 'canocial'));
    }

    public function show($slug)
    {
        $product = Product::with(['category', 'images'])->where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::with(['category', 'images'])
            ->where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->take(6)
            ->get();

        $isWishlisted = auth()->check()
            ? Wishlist::where('user_id', auth()->id())->where('product_id', $product->id)->exists()
            : false;

           


      $seo_data['seo_title'] = $product->seo_title ?: $product->title . ' — Pink City';
    $seo_data['seo_description'] = $product->seo_description ?: $product->short_description;
    $seo_data['keywords'] = $product->seo_keywords ?: '';
    $canocial = url('/product/' . $product->slug);

        return view('product_detail', compact('product', 'relatedProducts', 'isWishlisted', 'seo_data', 'canocial'));
    }

    public function searchSuggestions(Request $request)
{
    $search = $request->input('q');

    if (!$search || strlen($search) < 2) {
        return response()->json([]);
    }

    $products = Product::with(['category', 'images'])
        ->where('is_active', true)
        ->where('title', 'like', '%' . $search . '%')
        ->take(6)
        ->get()
        ->map(function ($product) {
            return [
                'title' => $product->title,
                'category' => $product->category->name,
                'price' => number_format($product->sale_price),
                'image' => $product->thumbnail,
                'url' => route('product.detail', $product->slug),
            ];
        });

    return response()->json($products);
}
}
