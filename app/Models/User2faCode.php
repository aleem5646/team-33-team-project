<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User2faCode extends Model
{
    use HasFactory;
    protected $table = 'user_2fa_codes';
    protected $fillable = [
        'userId',
        'code',
        'expires_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
}