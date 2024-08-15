<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function showDoctor()
    {
        $doctor = DB::table('doctors')->where('address','like','%K%')->get();
        return view('welcome',['data' => $doctor]);
    }


    public function singleUser(string $id)
    {
      $doctor = DB::table('doctors')->where('id', $id)->get();
      return view('user',['data' => $doctor]);
    }
}
