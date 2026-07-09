<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('blog-categories', BlogCategoryController::class);
    $router->resource('blogs', BlogController::class);

    $router->resource('products', ProductController::class);
    $router->resource('product-categories', ProductCategoryController::class);
    $router->resource('product-images', ProductImageController::class);

    $router->resource('contacts', ContactController::class);
    $router->resource('users', UserController::class);
    $router->resource('user-addresses', UserAddressController::class);



    $router->resource('orders', OrderController::class);
    $router->resource('order-items', OrderItemController::class);
    $router->resource('cart-items', CartItemController::class);
    $router->resource('profiles', ProfileController::class);

    $router->resource('wishlists', WishlistController::class);
    $router->resource('seos', SeoController::class);
});
