<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'flavour',
        'weight',
        'egg_type',
        'price',
        'discount_price',
        'stock',
        'image',
        'is_featured',
    ];

    protected $casts = [
        'price' => 'float',
        'discount_price' => 'float',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}