<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status',
        'shipping_address',
        'shipping_city',
        'shipping_country',
        'shipping_zip',
        'phone',
        'notes',
    ];

    // Relación con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación con OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

