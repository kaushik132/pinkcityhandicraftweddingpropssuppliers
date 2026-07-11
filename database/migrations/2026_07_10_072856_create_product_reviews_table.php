<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_reviews', function (Blueprint $table) {
           $table->id();
        $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->unsignedTinyInteger('rating'); // 1-5
        $table->string('city')->nullable();
        $table->string('title')->nullable();
        $table->text('review');
        $table->boolean('is_approved')->default(true); // moderation ke liye future mein useful
        $table->timestamps();

        $table->unique(['product_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
