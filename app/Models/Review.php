<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'reviewId';

    protected $fillable = [
        'product_id', // changed to snake case 
        'user_id', //
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