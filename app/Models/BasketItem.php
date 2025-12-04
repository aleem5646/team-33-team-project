<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BasketItem extends Model
{
    use HasFactory;
    protected $table = 'basket_items';
    protected $primaryKey = 'basket_itemId';
    public $timestamps = false;
    protected $fillable = [
        'basketId',
        'product_variantId',
        'quantity',
    ];

    // Relationships
    public function basket(): BelongsTo
    {
        return $this->belongsTo(Basket::class, 'basketId', 'basketId');
    }
    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variantId', 'product_variantId');
    }
}