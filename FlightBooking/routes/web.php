<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [UserController::class, 'showHomeFlights'])->name('view.home');


// Admin Routes

// User Authentication Routes
Route::get('/usersignin', function () {
    return view('auth.signin');
})->name('view.signin');

Route::get('/usersignup', function () {
    return view('auth.signup');
})->name('view.signup');

Route::post('/signingup', [UserController::class, 'signup'])->name('signup');
Route::post('/signingin', [UserController::class, 'signin'])->name('signin');

// Admin Authentication Routes
Route::get('/adminsignin', function () {
    return view('auth.adminsignin');
})->name('admin.signin');

// Define a POST route for admin sign-in
Route::post('/adminsignin', [AdminController::class, 'adminsignin'])->name('admin.signin');

// Dashboard Route
Route::get('/admindashboard', [AdminController::class, 'showDashboard'])->name('admin.admindashboard');

//Admin Flight data fetching
Route::get('/admindashboard/flightdata', [AdminController::class, 'showFlights'])->name('admin.flights');



//Admin : Page Add Flight
Route::get('/admindashboard/flightdata/addform', function () {
    return view('admin.addflight');
})->name('addform');

//Admin: Add Flight
Route::post('/admindashboard/flightdata/addform/addflights', [AdminController::class, 'insertData'])->name('addflight');
//Admin: Delete Flight
Route::get('/admindashboard/flightdata/deletedata/{id}', [AdminController::class, 'deleteData'])->name('deleteflight');



//Admin User data fetching
Route::get('/admindashboard/userdata', [AdminController::class, 'showUsers'])->name('admin.userdata');

//Admin: Delete user
Route::get('/admindashboard/flightdata/deleteuser/{id}', [AdminController::class, 'deleteUserData'])->name('deleteuser');



//UserPage Flight data fetching
Route::get('/home', [UserController::class, 'showFlights'])->name('user.flights');

//UserPage Single Flight Dara
Route::get('/home/flight-details/{id}', [UserController::class, 'showSingleFlights'])->name('user.Singleflights');
