<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookFlightController;
use App\Http\Controllers\FlightDataController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;


// User Authentication Routes
Route::get('/usersignin', function () {
    return view('auth.signin');
})->name('view.signin');

Route::get('/usersignup', function () {
    return view('auth.signup');
})->name('view.signup');




Route::middleware(ValidUser::class)->group(function () {

    // User Controller Methods

    Route::controller(UserController::class)->group(function () {

        //Signin and Signup
        Route::post('/signup', 'signup')->name('signup')->withoutMiddleware(ValidUser::class);
        Route::post('/signin', 'signin')->name('signin')->withoutMiddleware(ValidUser::class);

        //Logout User
        Route::get('/logout', 'logout')->name('logout')->withoutMiddleware(ValidUser::class);
    });


    // Flights Data Controller Methods

    Route::controller(FlightDataController::class)->group(function () {

        Route::get('/', 'showHomeFlights')->name('view.home')->withoutMiddleware(ValidUser::class);

        //UserPage Flight data fetching
        Route::get('/home', 'showFlights')->name('user.flights');

        //UserPage Single Flight Dara
        Route::get('/home/flight-details/{id}', 'showSingleFlights')->name('user.Singleflights');
    });



    // Booked Flights Controller Methods

    Route::controller(BookFlightController::class)->group(function () {
        // Stripe Checkout 
        Route::post('/home/checkout/{id}', 'checkout')->name('checkout');
        // Stripe Success
        Route::get('/home/payment-success/{flightid}', 'success')->name('success');
        // Stripe Cancel
        Route::get('/home/payment-cancel', 'cancel')->name('cancel');

        //Booked Flights
        Route::get('/home/bookings', 'cart')->name('bookedFlights');

        //Cancel Flight
        Route::get('/cancelflight/{id}', 'cancelFlight')->name('cancelflight');
    });
});


// Admin Controller Methods


Route::middleware(Admin::class)->group(function () {

    Route::controller(AdminController::class)->group(function () {

        // Dashboard Route
        Route::get('/admindashboard', 'showDashboard')->name('admin.admindashboard');

        //Admin Flight data fetching
        Route::get('/admindashboard/flightdata', 'showFlights')->name('admin.flights');

        //Admin: Add Flight
        Route::post('/admindashboard/flightdata/addform/addflights', 'insertData')->name('addflight');
        //Admin: Delete Flight
        Route::get('/admindashboard/flightdata/deletedata/{id}', 'deleteData')->name('deleteflight');

        //Admin User data fetching
        Route::get('/admindashboard/userdata', 'showUsers')->name('admin.userdata');

        //Admin: Delete user    
        Route::get('/admindashboard/flightdata/deleteuser/{id}', 'deleteUserData')->name('deleteuser');

        //Admin: Booked Flights Fetching
        Route::get('/admindashboard/booked-flights', 'showBookedFlights')->name('admin.bookedFlights');

        //Admin:Delete Booked Flights 
        Route::get('/admindashboard/booked-flights/delete-booked-flight/{id}', 'deleteBookedFlights')->name('admin.deletebookedFlights');
    });
});
//Admin : Page Add Flight
Route::get('/admindashboard/flightdata/addform', function () {
    return view('admin.addflight');
})->name('addform')->middleware(Admin::class);
