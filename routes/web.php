<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReturnController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

Route::get('/', function () {
    return view('pages.auth.home');
})->name('home');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');

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

Route::post('verify-code', [AuthManager::class, 'verifyCode'])->name('code.verify');

Route::get('2fa-verify', [AuthManager::class, 'show2faForm'])->name('2fa.form');
Route::post('2fa-verify', [AuthManager::class, 'verify2fa'])->name('2fa.verify');

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::find($id);
    if (!$user) {
        abort(404);
    }
    $expectedHash = sha1($user->getEmailForVerification());
    if (!hash_equals((string) $hash, $expectedHash)) {
        abort(403, 'Invalid verification link.');
    }
    if ($user->hasVerifiedEmail()) {
        return redirect(route('login'))->with('success', 'Email already verified! You may log in.');
    }
    if ($user->markEmailAsVerified()) {
        event(new Verified($user));
    }
    return redirect(route('login'))->with('success', 'Email verified! You may now log in.');

})->middleware(['signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware(['auth', 'verified']);
# Add any routes that a logged in user can access in 
# this route group
Route::group(['middleware'=>['auth','verified']], function (){
    #this /profile thing is a placeholder for now obvs
    Route::get('/profile', function(){
    return "Hi";
    });

});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get("/product-detail", function () {
    return view("pages.product-detail");
});
Route::get('/returns', [ReturnController::class, 'showForm'])->name('returns.form');
Route::post('/returns', [ReturnController::class, 'submitForm'])->name('returns.submit');

Route::get("/returns", function () {
    return view("pages.return");
});
use App\Http\Controllers\BasketController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
    Route::post('/basket/add', [BasketController::class, 'add'])->name('basket.add');
    Route::post('/basket/remove/{itemId}', [BasketController::class, 'remove'])->name('basket.remove');
    Route::post('/basket/update/{itemId}', [BasketController::class, 'update'])->name('basket.update');
});
