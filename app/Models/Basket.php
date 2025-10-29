<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Basket extends Model
{
    use HasFactory;

    protected $primaryKey = 'basketId';
    protected $fillable = [
        'userId',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
    public function items(): HasMany
    {
        return $this->hasMany(BasketItem::class, 'basketId', 'basketId');
    }
}