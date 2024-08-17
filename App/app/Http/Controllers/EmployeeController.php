<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //Show user functionality
    public function showEmployees(){
        $employees = DB::table("employees")->get(); // Renamed variable to $employees for clarity
        return view("welcome", ['data' => $employees]);
    }
    
    public function showSingleEmployees(string $id){
        $employee = DB::table("employees")->where('id', $id)->get(); // Use first() for a single record
        return view("data", ['data' => $employee]);
    }
    
    //Add user functionality
    public function addUser(Request $req){
        $employees = DB::table("employees")->insert([
            'name'=> $req->name,
            'phone'=> $req->phone,
            'email'=> $req->email,
            'city'=> $req->city,
        ]); 
    }

    //Delete user functionality
    public function deleteSingleEmployees(string $id)
    {
        $employees = DB::table('employees')->where('id',$id)->delete();

        if($employees)
        {
            echo "<h3>Data Deleted Successfully</h3>";
        }
    }
}
