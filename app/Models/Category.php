<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'categoryId';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    // Relationship
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'categoryId', 'categoryId');
    }
}