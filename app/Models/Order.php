<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'orderId';
    protected $fillable = [
        'userId',
        'shippingId',
        'transactionId',
        'total_price',
        'status',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class, 'shippingId', 'shippingId');
    }
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'orderId', 'orderId');
    }
}