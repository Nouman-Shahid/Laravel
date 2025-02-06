<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookedHotelsController;
use App\Http\Middleware\AdminMiddleware;
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
    Route::get('/cart', [BookedHotelsController::class, 'cart'])->name('cart');
});


Route::get('/checkout/{id}', [StripeController::class, 'checkout'])->middleware(['auth', 'verified'])->name('checkout');
Route::get('/checkout/success/{id}', [StripeController::class, 'success'])->middleware(['auth', 'verified'])->name('success');




Route::post('/search', [HotelController::class, 'search'])->name('search');


Route::middleware(AdminMiddleware::class)->group(
    function () {

        Route::controller(AdminController::class)->group(
            function () {


                Route::get('/admindashboard/import', function () {
                    return view('admin.adminimport');
                })->name('import.form');

                Route::post('/import', 'import')->name('import');

                Route::get('/admindashboard', 'showDashboard')->name('admindashboard');

                Route::get('logout', 'logout')
                    ->name('logout');


                //Admin User data fetching
                Route::get('/admindashboard/userdata', 'showUsers')->name('admin.userdata');

                //Admin: Delete user    
                Route::get('/admindashboard/flightdata/deleteuser/{id}', 'deleteUserData')->name('deleteuser');

                //Admin Hotel data fetching
                Route::get('/admindashboard/hoteldata', 'showHotelData')->name('admin.hoteldata');

                //Admin: Delete Hotel    
                Route::get('/admindashboard/hoteldata/deletehotel/{id}', 'deleteHotelData')->name('deletehoteldata');


                //Admin Booked Hotel data fetching
                Route::get('/admindashboard/bookedhotelsdata', 'showBookedHotelData')->name('admin.bookedhoteldata');

                //Admin: Delete BookedHotel    
                Route::get('/admindashboard/bookedhotelsdata/deletehotel/{id}', 'deleteBookedHotelData')->name('deletebookedHotels');
            }
        );
    }
);


require __DIR__ . '/auth.php';
