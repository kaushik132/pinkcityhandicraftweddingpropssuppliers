<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\CartItem;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
public function boot()
{
     view()->composer('*', function ($view) {
        $wishlistCount = Auth::check()
            ? Wishlist::where('user_id', Auth::id())->count()
            : 0;

        $view->with('wishlistCount', $wishlistCount);
    });

    view()->composer('*', function ($view) {
    $cartCount = auth()->check()
        ? CartItem::where('user_id', auth()->id())->sum('quantity')
        : 0;

    $view->with('cartCount', $cartCount);
});
}
}
