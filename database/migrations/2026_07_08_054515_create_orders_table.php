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
      Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('order_number')->unique();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->foreignId('user_address_id')->nullable()->constrained('user_addresses')->nullOnDelete();

        // address snapshot (address delete ho jaye to bhi order ka record safe rahe)
        $table->string('full_name');
        $table->string('mobile');
        $table->string('address');
        $table->string('landmark')->nullable();
        $table->string('city');
        $table->string('state');
        $table->string('pincode');

        $table->decimal('subtotal', 10, 2);
        $table->decimal('discount', 10, 2)->default(0);
        $table->decimal('shipping_charge', 10, 2)->default(0);
        $table->decimal('total', 10, 2);

        $table->string('coupon_code')->nullable();

        $table->enum('payment_method', ['upi', 'card', 'netbanking', 'wallets', 'cod'])->default('cod');
        $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
        $table->string('razorpay_order_id')->nullable();
        $table->string('razorpay_payment_id')->nullable();

        $table->enum('status', ['placed', 'processing', 'shipped', 'delivered', 'cancelled'])->default('placed');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
