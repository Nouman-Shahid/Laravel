<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/', [TeacherController::class,'showData'])->name('view.teacher');
Route::get('/teachers/{id}', [TeacherController::class,'showSingleData'])->name('view.teachersingledata');
