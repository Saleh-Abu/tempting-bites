<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function cakes()
{
    return $this->hasMany(Cake::class);
}
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        
    ];
}