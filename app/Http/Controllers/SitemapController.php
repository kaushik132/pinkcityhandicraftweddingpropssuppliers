<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->select('slug', 'updated_at')->get();
        $blogs = Blog::select('slug', 'updated_at')->get();
        $productCategories = ProductCategory::select('slug', 'updated_at')->get();
        $blogCategories = BlogCategory::select('slug', 'updated_at')->get();

        $content = view('sitemap', compact('products', 'blogs', 'productCategories', 'blogCategories'))->render();

        return Response::make($content, 200, [
            'Content-Type' => 'text/xml',
        ]);
    }
}
