<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id',
        'cake_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }
}