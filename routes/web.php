<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[AuthManager::class, 'login'])-> name('login');
Route::post('/login',[AuthManager::class, 'loginPost'])-> name('login.post');

Route::get('/registration',[AuthManager::class, 'registration'])->name('registration');
Route::post('/registration',[AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout',[AuthManager::class,'logout'])->name('logout');

# Add any routes that a logged in user can access in 
# this route group
Route::group(['middleware'=>'auth'], function (){
    #this /profile thing is a placeholder for now obvs
    Route::get('/profile', function(){
    return "Hi";
    });

});

