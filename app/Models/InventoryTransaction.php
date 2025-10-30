<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryTransaction extends Model
{
    use HasFactory;
    protected $table = 'inventory_transactions';
    protected $primaryKey = 'transactionId';
    protected $fillable = [
        'product_variantId',
        'userId',
        'quantity',
        'transaction_type',
    ];

    // Relationships
    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variantId', 'product_variantId');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
}