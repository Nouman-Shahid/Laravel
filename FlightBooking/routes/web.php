<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// User Authentication Routes
Route::get('/usersignin', function () {
    return view('auth.signin');
})->name('view.signin');

Route::get('/usersignup', function () {
    return view('auth.signup');
})->name('view.signup');

// Admin Authentication Routes
Route::get('/adminsignin', function () {
    return view('auth.adminsignin');
})->name('admin.signin');


//Admin : Page Add Flight
Route::get('/admindashboard/flightdata/addform', function () {
    return view('admin.addflight');
})->name('addform');




// User Controller Methods

Route::controller(UserController::class)->group(function () {

    // Public Routes
    Route::get('/', 'showHomeFlights')->name('view.home');

    //Signin and Signup
    Route::post('/signup', 'signup')->name('signup');
    Route::post('/signin', 'signin')->name('signin');

    //UserPage Flight data fetching
    Route::get('/home', 'showFlights')->name('user.flights');

    //UserPage Single Flight Dara
    Route::get('/home/flight-details/{id}', 'showSingleFlights')->name('user.Singleflights');

    // Stripe Checkout 
    Route::post('/home/checkout/{id}', 'checkout')->name('checkout');
    // Stripe Success
    Route::get('/home/payment-success/{flightid}', 'success')->name('success');
    // Stripe Cancel
    Route::get('/home/payment-cancel', 'cancel')->name('cancel');

    //Booked Flights
    Route::get('/home/bookings', 'cart')->name('bookedFlights');

    //Logout User
    Route::get('/logout', 'logout')->name('logout');

    //Cancel Flight
    Route::get('/cancelflight/{id}', 'cancelFlight')->name('cancelflight');
});




// Admin Controller Methods

Route::controller(AdminController::class)->group(function () {
    // Define a POST route for admin sign-in
    Route::post('/adminsignin', 'adminsignin')->name('admin.signin');

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
