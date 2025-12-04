<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'userId';
    protected $table = "users";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'hashed_password',
        'phone',
        //'user_type',
        'role',   // for RBAC 
    ];

    protected $hidden = [
        'hashed_password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'hashed_password' => 'hashed',
        ];
    }

    public function getAuthPassword()
    {
        return $this->hashed_password;
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
    public function serviceReviews(): HasMany
    {
         return $this->hasMany(ServiceReview::class, 'userId', 'userId');
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