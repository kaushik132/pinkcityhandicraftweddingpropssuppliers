<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seo';

    protected $fillable = [
        'seo_title_home', 'seo_des_home', 'seo_key_home',
        'seo_title_about', 'seo_des_about', 'seo_key_about',
        'seo_title_contact', 'seo_des_contact', 'seo_key_contact',
        'seo_title_products', 'seo_des_products', 'seo_key_products',
        'seo_title_blog', 'seo_des_blog', 'seo_key_blog',
        'seo_title_wishlist', 'seo_des_wishlist', 'seo_key_wishlist',
        'seo_title_cart', 'seo_des_cart', 'seo_key_cart',
        'seo_title_privacy', 'seo_des_privacy', 'seo_key_privacy',
        'seo_title_terms', 'seo_des_terms', 'seo_key_terms',
        'seo_title_shipping', 'seo_des_shipping', 'seo_key_shipping',
        'seo_title_return', 'seo_des_return', 'seo_key_return',
    ];
}
