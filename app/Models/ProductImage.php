<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'image',
        'sort_order',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {

            // Edit ke time image upload na ho to purana path preserve karo
            if (empty($model->image) && $model->exists) {

                $old = self::find($model->id);

                if ($old && !empty($old->image)) {
                    $model->image = $old->image;
                }
            }
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getImageAttribute($value)
    {
        if ($value == '0' || empty($value)) {
            return null;
        }

        return $value;
    }


    public function getUrlAttribute(): string
    {
        if (!$this->image || $this->image === '0' || $this->image === 0) {
            return '';
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        return asset('uploads/' . $this->image);
    }
}
