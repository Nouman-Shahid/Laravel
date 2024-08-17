<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Route for showing the list of employees
Route::get('/', [EmployeeController::class, 'showEmployees'])->name('employees');

// Route for showing a single employee
Route::get('/employees/{id}', [EmployeeController::class, 'showSingleEmployees'])->name('view.employees');

// Route for deleting a single employee
Route::get('/delete/{id}', [EmployeeController::class, 'deleteSingleEmployees'])->name('view.delete');



Route::post('/add', [EmployeeController::class,'addUser'])->name('addUser');

// Route for Add new user
Route::view('/newuser','/adduser');
