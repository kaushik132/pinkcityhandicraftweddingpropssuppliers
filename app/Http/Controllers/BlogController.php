<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = BlogCategory::withCount('blogs')->orderBy('name')->get();

        $query = Blog::with('category')->latest('published_at');

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->paginate(6)->withQueryString();

        $popularPosts = Blog::orderByDesc('views')->take(3)->get();

        return view('blog', compact('categories', 'blogs', 'popularPosts'));
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

        return view('blog-detail', compact('blog', 'categories', 'popularPosts'));
    }
}
