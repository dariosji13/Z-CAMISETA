<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'size',
        'color',
        'style',
        'image',
        'active'
    ];

    public function OrderItems() {
        return $this->hasMany(OrderItem::class);
    }
}


