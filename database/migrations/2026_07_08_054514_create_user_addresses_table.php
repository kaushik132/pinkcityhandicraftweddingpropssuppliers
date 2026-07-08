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
         Schema::create('user_addresses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->enum('type', ['home', 'work'])->default('home');
        $table->string('full_name');
        $table->string('country_code')->default('+91');
        $table->string('mobile');
        $table->string('pincode');
        $table->string('address');
        $table->string('landmark')->nullable();
        $table->string('city');
        $table->string('state');
        $table->boolean('is_default')->default(false);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
