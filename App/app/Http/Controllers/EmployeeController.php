<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function showEmployees(){
        $employees = DB::table("employees")->get(); // Renamed variable to $employees for clarity
        return view("welcome", ['data' => $employees]);
    }

    public function showSingleEmployees(string $id){
        $employee = DB::table("employees")->where('id', $id)->get(); // Use first() for a single record
        return view("data", ['data' => $employee]);
    }

    public function deleteSingleEmployees(string $id)
    {
        $employees = DB::table('employees')->where('id',$id)->delete();

        if($employees)
        {
            echo "<h3>Data Deleted Successfully</h3>";
        }
    }
}
