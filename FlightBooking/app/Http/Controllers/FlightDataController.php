<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightDataController extends Controller
{
    public function showFlights()
    {
        $data = DB::table('flight-data')->get();

        return view('pages.userdashboard', ['data' => $data]);
    }

    public function showHomeFlights()
    {
        $result = DB::table('flight-data')->paginate(6);

        return view('pages.welcome', ['data' => $result]);
    }

    public function showSingleFlights(string $id)
    {
        $data = DB::table('flight-data')->where('id', $id)->first();

        return view('pages.flightdescription', ['data' => $data]);
    }
}
