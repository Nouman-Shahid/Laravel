<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHome(){
        return view('pages.welcome',['data'=>'Data to enrich your online business']);   
    }
    public function showUser(string $id){
        return view('pages.user',compact('id'));    
    }


}
