<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyPolicyController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/search-suggestions', [ProductController::class, 'searchSuggestions'])->name('products.search-suggestions');

Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
      Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
});

// Auth routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::delete('/profile/delete', [ProfileController::class, 'deleteAccount'])->name('profile.delete');

    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');

    // Wishlist routes
     Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{product}', [WishlistController::class, 'remove'])->name('wishlist.remove');

    // Cart routes
     Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/increment/{id}', [CartController::class, 'increment'])->name('cart.increment');
    Route::post('/cart/decrement/{id}', [CartController::class, 'decrement'])->name('cart.decrement');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');


     // Checkout — address
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/save-address', [CheckoutController::class, 'saveAddress'])->name('checkout.save-address');

    // Payment page
    Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
    Route::post('/payment/place-order', [PaymentController::class, 'placeOrder'])->name('payment.place-order');
    Route::post('/payment/verify', [PaymentController::class, 'verify'])->name('payment.verify');

    // Confirm order (success page)
    Route::get('/confirm-order/{order}', function (\App\Models\Order $order) {
        abort_if($order->user_id !== auth()->id(), 403);
        return view('confirm_order', compact('order'));
    })->name('confirm.order');

       Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{id}/invoice', [OrderController::class, 'invoice'])->name('orders.invoice');

});
// Toggle route — auth ke BAHAR, kyunki guest bhi is par click kar sakta hai (heart icon)
// Controller ke andar khud auth()->check() se 401 return hota hai, taaki AJAX ko clean JSON mile
   Route::post('/wishlist/toggle/{product}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');


//
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');

// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.detail');



//Policy routes
Route::get('/privacy-policy', [CompanyPolicyController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-and-conditions', [CompanyPolicyController::class, 'termsAndConditions'])->name('terms.and.conditions');
Route::get('/shipping-policy', [CompanyPolicyController::class, 'shippingPolicy'])->name('shipping.policy');
Route::get('/return-and-refund-policy', [CompanyPolicyController::class, 'returnAndRefundPolicy'])->name('return.and.refund.policy');
