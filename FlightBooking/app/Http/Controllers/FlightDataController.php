<?php

namespace App\Http\Controllers;

use App\Models\flightdata;

class FlightDataController extends Controller
{
    public function showFlights()
    {
        $data = flightdata::all();

        return view('pages.userdashboard', ['data' => $data]);
    }

    public function showHomeFlights()
    {
        $result = flightdata::paginate(6);

        return view('pages.welcome', ['data' => $result]);
    }

    public function showSingleFlights(string $id)
    {
        $data = flightdata::where('id', $id)->first();

        return view('pages.flightdescription', ['data' => $data]);
    }
}
