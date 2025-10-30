<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Filter extends Model
{
    use HasFactory;
    protected $primaryKey = 'filterId';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    // Relationship
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_filter', 'filterId', 'productId');
    }
}