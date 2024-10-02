<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/chat-room', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/groups', [GroupController::class, 'showGroupData'])->name('groups');


Route::get('/new-group', function () {
    return Inertia::render('GroupForm');
})->middleware(['auth', 'verified'])->name('groupform');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/group', [GroupController::class, 'storeGroupData'])->name('groups.store');
    Route::get('/group/{id}', [GroupController::class, 'showSingleGroupData'])->name('groups.show');
});

require __DIR__ . '/auth.php';
