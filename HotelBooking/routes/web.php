<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HotelController::class, 'getHotels'])->name('home');

Route::get('/room/id/{id}', [HotelController::class, 'getSingleHotels'])->middleware(['auth', 'verified']);


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Display Users Info
Route::get('/users', [UserController::class, 'loadUsers'])->name('loadusers');
Route::post('/addusers', [UserController::class, 'store'])->name('adduser');



// For deleting a user
Route::get('/users/delete/{id}', [UserController::class, 'destroy']);


//Payment Gateway
Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [StripeController::class, 'success'])->name('success');
Route::get('/checkout/cancel', [StripeController::class, 'cancel'])->name('cancel');


Route::view('/page', 'AddUser');


require __DIR__ . '/auth.php';
