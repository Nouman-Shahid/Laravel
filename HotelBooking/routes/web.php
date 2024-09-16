<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HotelController::class, 'getHotels'])->name('home');

Route::get('/room/id/{id}', [HotelController::class, 'getSingleHotels']);


Route::get('/about-us', function () {
    return Inertia::render('About');
})->name('about');
Route::get('/help', function () {
    return Inertia::render('Help');
})->name('help');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// For deleting a user
Route::get('/users/delete/{id}', [UserController::class, 'destroy']);


Route::get('/checkout/{id}', [StripeController::class, 'checkout'])->middleware(['auth', 'verified'])->name('checkout');
Route::get('/checkout/success/{id}', [StripeController::class, 'success'])->middleware(['auth', 'verified'])->name('success');




Route::post('/search', [HotelController::class, 'search'])->name('search');


Route::get('/import', function () {
    return view('import');
})->name('import.form');

Route::post('/import', [AdminController::class, 'import'])->name('import');


require __DIR__ . '/auth.php';
