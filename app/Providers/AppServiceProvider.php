<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProductCategory;

class AppServiceProvider extends ServiceProvider
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
    View::composer('*', function ($view) {

        $headerCategories = ProductCategory::with([
            'products' => function ($q) {
                $q->where('is_active', 1)
                  ->orderBy('title')
                  ->take(6);      // Har category ke max 6 products
            }
        ])->orderBy('name')->get();

        $view->with('headerCategories', $headerCategories);
    });
}
}
