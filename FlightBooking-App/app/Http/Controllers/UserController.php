<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUsers(){
$user = DB::table("users")->get();
return  view("welcome",['data'=>$user]);

}
}