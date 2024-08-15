<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function showDoctor()
    {
        $doctor = DB::table('doctors')->get();
        return view('welcome',['data' => $doctor]);

        

    }
}
