<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/', [TeacherController::class,'showData']);
Route::get('/add', [TeacherController::class,'addUser']);
Route::get('/teachers/{id}', [TeacherController::class,'showSingleData'])->name('view.teachersingledata');
Route::get('/delete/{id}', [TeacherController::class,'deleteUser'])->name('view.delete');
