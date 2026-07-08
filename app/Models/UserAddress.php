<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id', 'type', 'full_name', 'country_code', 'mobile',
        'pincode', 'address', 'landmark', 'city', 'state', 'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
