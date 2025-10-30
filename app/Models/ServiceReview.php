<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceReview extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $primaryKey = 'reviewId';
    protected $fillable = [
        'userId',
        'rating',
        'review',
    ];
    // Relationship
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
}
