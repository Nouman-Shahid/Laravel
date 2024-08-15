<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::get('/', [DoctorController::class,'showDoctor']);
Route::get('/user/{id}', [DoctorController::class,'singleUser'])->name('view.user');
