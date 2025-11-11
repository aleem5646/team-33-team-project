<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'hashed_password' => Hash::make('password'), 
            'phone' => '555-1234',
            'user_type' => 'admin', 
        ]);
        
        User::create([
            'first_name' => 'Jane',
            'last_name' => 'Customer',
            'email' => 'jane@example.com',
            'hashed_password' => Hash::make('password'),
            'user_type' => 'customer', 
        ]);
    }
}