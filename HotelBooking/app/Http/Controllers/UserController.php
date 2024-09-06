<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function loadUsers()
    {
        $userData = User::all();
        $usersAuth = Auth::user();
        return Inertia::render('Users/Users', ['user' => $usersAuth, 'data' => $userData]);
    }
}
