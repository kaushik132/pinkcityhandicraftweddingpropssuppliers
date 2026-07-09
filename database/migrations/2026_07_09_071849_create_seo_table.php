<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('seo', function (Blueprint $table) {
        $table->id();

        // Home
        $table->text('seo_title_home')->nullable();
        $table->text('seo_des_home')->nullable();
        $table->text('seo_key_home')->nullable();

        // About
        $table->text('seo_title_about')->nullable();
        $table->text('seo_des_about')->nullable();
        $table->text('seo_key_about')->nullable();

        // Contact
        $table->text('seo_title_contact')->nullable();
        $table->text('seo_des_contact')->nullable();
        $table->text('seo_key_contact')->nullable();

        // Products (listing page)
        $table->text('seo_title_products')->nullable();
        $table->text('seo_des_products')->nullable();
        $table->text('seo_key_products')->nullable();

        // Blog (listing page)
        $table->text('seo_title_blog')->nullable();
        $table->text('seo_des_blog')->nullable();
        $table->text('seo_key_blog')->nullable();

        // Wishlist
        $table->text('seo_title_wishlist')->nullable();
        $table->text('seo_des_wishlist')->nullable();
        $table->text('seo_key_wishlist')->nullable();

        // Cart
        $table->text('seo_title_cart')->nullable();
        $table->text('seo_des_cart')->nullable();
        $table->text('seo_key_cart')->nullable();

        // Privacy Policy
        $table->text('seo_title_privacy')->nullable();
        $table->text('seo_des_privacy')->nullable();
        $table->text('seo_key_privacy')->nullable();

        // Terms & Conditions
        $table->text('seo_title_terms')->nullable();
        $table->text('seo_des_terms')->nullable();
        $table->text('seo_key_terms')->nullable();

        // Shipping Policy
        $table->text('seo_title_shipping')->nullable();
        $table->text('seo_des_shipping')->nullable();
        $table->text('seo_key_shipping')->nullable();

        // Return & Refund Policy
        $table->text('seo_title_return')->nullable();
        $table->text('seo_des_return')->nullable();
        $table->text('seo_key_return')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo');
    }
};
