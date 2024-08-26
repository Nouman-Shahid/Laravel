<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('pages.welcome');
})->name('view.home');

// Admin Routes
Route::get('/addflight', [AdminController::class, 'insertData']);

// User Authentication Routes
Route::get('/usersignin', function () {
    return view('auth.signin');
})->name('view.signin');

Route::get('/usersignup', function () {
    return view('auth.signup');
})->name('view.signup');

Route::post('/signingup', [UserController::class, 'signup'])->name('signup');
Route::post('/signingin', [UserController::class, 'signin'])->name('signin');
Route::get('/userdashboard', [UserController::class, 'dashboard'])->name('dashboard');

// Admin Authentication Routes
Route::get('/adminsignin', function () {
    return view('auth.adminsignin');
})->name('admin.signin');

// Define a POST route for admin sign-in
Route::post('/adminsignin', [AdminController::class, 'adminsignin'])->name('admin.signin');

// Dashboard Route
Route::get('/admindashboard', [AdminController::class, 'showDashboard'])->name('admin.admindashboard');

//Admin data fetching
Route::get('/admindashboard/flightdata', [AdminController::class, 'showFlights'])->name('admin.flights');



//Admin : Add Flight
Route::get('/admindashboard/flightdata/add-flights', function () {
    return view('admin.addflight');
})->name('addflight');
