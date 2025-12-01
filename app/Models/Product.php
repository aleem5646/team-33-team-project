<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'productId';
    protected $fillable = [
        'categoryId',
        'name',
        'description',
        'price',
        'image_url',
    ];

    // Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoryId', 'categoryId');
    }
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class, 'productId', 'productId');
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class, 'productId', 'productId');
    }
    public function filters(): BelongsToMany
    {
        return $this->belongsToMany(Filter::class, 'product_filter', 'productId', 'filterId');
    }
}