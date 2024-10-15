<?php

use App\Http\Controllers\GroupInviteController;
use App\Models\GroupInvite;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

// Route::get('/chat-room', function () {
//     return Inertia::render('Dashboard');
// });

Route::get('/chat-room', [GroupInviteController::class, 'showInvite'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/groups', [GroupController::class, 'showGroupData'])->name('groups');


Route::get('/new-group', function () {
    return Inertia::render('GroupForm');
})->middleware(['auth', 'verified'])->name('groupform');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/group', [GroupController::class, 'storeGroupData'])->name('groups.store');
    Route::get('/groups/{id}', [GroupController::class, 'showSingleGroupData'])->name('groups.show');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/search', [GroupController::class, 'search'])->name('search');
    Route::get('/search-user', [GroupController::class, 'searchUser'])->name('searchUser');
    Route::post('/invite/{userId}/{groupcode}', [GroupInviteController::class, 'invite'])->name('invite');
});

require __DIR__ . '/auth.php';
