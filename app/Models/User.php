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
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'hashed_password',
        'user_type',
        'address_line',
        'city',
        'postcode',
        'country'
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

    //Helper functions
    public function getAuthPassword()
    {
        return $this->hashed_password;
    }

    public function getName() : string {
        /* returns the full name of the user */
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAddress() : string {
        /* returns the users full address */
        return "{$this->address_line}, {$this->city}, {$this->postcode}, {$this->country}";
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