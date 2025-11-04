<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', [AuthManager::class, 'login'])->name('login');
Route::post('login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('forgot-password', [AuthManager::class, 'passwordRequest'])
     ->name('password.request');

Route::post('forgot-password', [AuthManager::class, 'passwordEmail'])
     ->name('password.email');

Route::get('reset-password/{token}', [AuthManager::class, 'passwordReset'])
     ->name('password.reset');

Route::post('reset-password', [AuthManager::class, 'passwordUpdate'])
     ->name('password.update');

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
# Add any routes that a logged in user can access in 
# this route group
Route::group(['middleware'=>'auth'], function (){
    #this /profile thing is a placeholder for now obvs
    Route::get('/profile', function(){
    return "Hi";
    });

});

