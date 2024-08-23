<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
})->name('view.home');

Route::get('/addflight', [AdminController::class, 'insertData']);


Route::get('/signin', function () {
    return view('auth.signin');
})->name('view.signin');

Route::get('/signup', function () {
    return view('auth.signup');
})->name('view.signup');


Route::post('/signingup', [UserController::class, 'signup'])->name('signup');
Route::post('/signingin', [UserController::class, 'signin'])->name('signin');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
