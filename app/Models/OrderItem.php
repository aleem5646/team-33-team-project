<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_itemId';
    public $timestamps = false;
    protected $fillable = [
        'orderId',
        'product_variantId',
        'quantity',
        'price',
    ];

    // Relationships
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'orderId', 'orderId');
    }
    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variantId', 'product_variantId');
    }
}