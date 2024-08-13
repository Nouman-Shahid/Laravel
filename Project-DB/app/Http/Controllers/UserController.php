<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUser()
    {
        $user = DB::table("students")->get();
         return $user;
    }
}
