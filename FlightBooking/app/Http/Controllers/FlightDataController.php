<?php

namespace App\Http\Controllers;

use App\Models\flightdata;

class FlightDataController extends Controller
{

    //Show Flights data after user authentication
    public function showFlights()
    {
        $data = flightdata::all();

        return view('pages.userdashboard', ['data' => $data]);
    }

    //Show Flights data to guest user
    public function showHomeFlights()
    {
        $result = flightdata::paginate(6);

        return view('pages.welcome', ['data' => $result]);
    }

    //Show single flight data
    public function showSingleFlights(string $id)
    {
        $data = flightdata::where('id', $id)->first();

        return view('pages.flightdescription', ['data' => $data]);
    }
}
