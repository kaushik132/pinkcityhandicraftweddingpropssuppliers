<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'blog_category_id', 'title', 'slug', 'image',
        'excerpt', 'content', 'read_time', 'views', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    // public/uploads/ pattern follow kiya (Storage facade nahi)
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('uploads/blogs/' . $this->image) : asset('uploads/blogs/default.jpg');
    }
}
