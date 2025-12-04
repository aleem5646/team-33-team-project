<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'product_variantId';
    public $timestamps = false;
    protected $fillable = [
        'productId',
        'count',
        'name',
        'value',
        'price',
    ];

    public function getAttributes() : string {
        /* Returns the attributes of the product variant like size, colour etc */
        return "{$this->name}: {$this->value}";
    }

    // Relationship
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'productId', 'productId');
    }
}