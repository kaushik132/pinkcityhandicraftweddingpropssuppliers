<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number', 'user_id', 'user_address_id',
        'full_name', 'mobile', 'address', 'landmark', 'city', 'state', 'pincode',
        'subtotal', 'discount', 'shipping_charge', 'total', 'coupon_code',
        'payment_method', 'payment_status', 'razorpay_order_id', 'razorpay_payment_id', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getSavingsAttribute()
    {
        return $this->discount;
    }
}
