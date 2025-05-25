<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    // Opcional: si quieres protección de campos masivos
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
    ];

    /**
     * Relación: Un OrderItem pertenece a un Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relación: Un OrderItem pertenece a un Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

