<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Seo;

class BlogController extends Controller
{
    public function index(Request $request)
    {
         $homepage = Seo::latest()->first();
        $categories = BlogCategory::withCount('blogs')->orderBy('name')->get();

        $query = Blog::with('category')->latest('published_at');

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

         $seo_data['seo_title'] = $homepage->seo_title_blog ?? 'Blog — Pink City';
    $seo_data['seo_description'] = $homepage->seo_des_blog ?? '';
    $seo_data['keywords'] = $homepage->seo_key_blog ?? '';
    $canocial = url('/blog');

        $blogs = $query->paginate(6)->withQueryString();

        $popularPosts = Blog::orderByDesc('views')->take(3)->get();

        return view('blog', compact('categories', 'blogs', 'popularPosts', 'seo_data', 'canocial'));
    }

    public function show($slug)
    {
        $blog = Blog::with('category')->where('slug', $slug)->firstOrFail();
        $blog->increment('views');

        $categories = BlogCategory::withCount('blogs')->orderBy('name')->get();

        $popularPosts = Blog::where('id', '!=', $blog->id)
            ->orderByDesc('views')
            ->take(3)
            ->get();

       $seo_data['seo_title'] = $blog->seo_title ?: $blog->title . ' — Pink City Blog';
    $seo_data['seo_description'] = $blog->seo_description ?: $blog->excerpt;
    $seo_data['keywords'] = $blog->seo_keywords ?: '';
    $canocial = url('/blog/' . $blog->slug);

        return view('blog-detail', compact('blog', 'categories', 'popularPosts', 'seo_data', 'canocial'));
    }
}
