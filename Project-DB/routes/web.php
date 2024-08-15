<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::get('/', [DoctorController::class,'showDoctor']);
