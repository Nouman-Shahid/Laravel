<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function insertData()
    {
        $flightData = DB::table("flight-data")->insert([

            'origin' => 'Lahore',
            'destination' => 'Germany',
            'depart' => '2024-08-29',
            'arrival' => '2024-09-09',
            'amount' => 540000,
        ]);
    }
}
