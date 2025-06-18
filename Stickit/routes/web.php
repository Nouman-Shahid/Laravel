<?php

use App\Http\Controllers\NotesController;
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

Route::get('/dashboard', [NotesController::class, 'get'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/store', [NotesController::class, 'store'])->name('store');
Route::get('/completed/{id}', [NotesController::class, 'completed']);
Route::get('/remove/{id}', [NotesController::class, 'remove']);



Route::get('/pending', [NotesController::class, 'getPending'])->name('pending');
Route::get('/completed', [NotesController::class, 'getCompleted'])->name('completed');




require __DIR__ . '/auth.php';
