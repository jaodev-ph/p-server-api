<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = [];

    public function shopowner() {
        return $this->hasOne(User::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
