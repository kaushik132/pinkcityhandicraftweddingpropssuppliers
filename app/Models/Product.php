<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_category_id',
        'title',
        'slug',
        'sku',
        'product_badge',
        'short_description',
        'description',
        'price',
        'sale_price',
        'stock',
        'rating',
        'reviews_count',
        'specs',
        'ships_in_days',
        'is_active',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'specs' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id')
            ->orderBy('sort_order');
    }

    // main/cover image (first image)
    public function getThumbnailAttribute()
    {
        $first = $this->images->first();
        return $first ? asset('uploads/' . $first->image) : asset('uploads/products/default.jpg');
    }

    public function getDiscountPercentAttribute()
    {
        if ($this->price <= 0) return 0;
        return round((($this->price - $this->sale_price) / $this->price) * 100);
    }

    public function getSavingsAttribute()
    {
        return $this->price - $this->sale_price;
    }

    public function wishlistedBy()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class)->where('is_approved', true)->latest();
    }
}
