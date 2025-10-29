<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'userId';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'hashed_password',
        'phone',
        'user_type',
    ];

    protected $hidden = [
        'hashed_password',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'hashed_password' => 'hashed',
        ];
    }
    // Relationships
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'userId', 'userId');
    }
    public function shippingAddresses(): HasMany
    {
        return $this->hasMany(ShippingAddress::class, 'userId', 'userId');
    }
    public function basket(): HasOne
    {
        return $this->hasOne(Basket::class, 'userId', 'userId');
    }
    public function reviews(): HasMany
    {
         return $this->hasMany(Review::class, 'userId', 'userId');
    }
    public function returns(): HasMany
    {
         return $this->hasMany(ReturnModel::class, 'userId', 'userId');
    }
    public function inventoryTransactions(): HasMany
    {
        return $this->hasMany(InventoryTransaction::class, 'userId', 'userId');
    }
}