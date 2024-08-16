<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function showData()
    {
        $teachers = DB::table('teachers')->get();
        return view('welcome',['data'=>$teachers]);
    }
    public function showSingleData(string $id)
    {
        $teachers = DB::table('teachers')->where('id',$id)->get();
        return view('teachers',['data'=>$teachers]);
    }
}
