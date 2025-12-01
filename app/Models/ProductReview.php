<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_reviewId';
    protected $fillable = [
        'productId',
        'userId',
        'rating',
        'review',
    ];

    // Relationships
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'productId', 'productId');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
}