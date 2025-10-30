<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'product_variantId';
    protected $fillable = [
        'productId',
        'count',
        'name',
        'value',
        'sku',
        'price',
    ];

    // Relationship
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'productId', 'productId');
    }
}