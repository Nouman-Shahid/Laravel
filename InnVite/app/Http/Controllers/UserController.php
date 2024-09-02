<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showData()
    {
        $data = User::where('id', 1)->first();

        return view('home', ['data' => $data]);
    }
}
