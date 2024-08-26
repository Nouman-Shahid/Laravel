<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Hardcoded credentials
    private const VALID_EMAIL = 'admin@gmail.com';
    private const VALID_PASSWORD = 'admin123';

    public function adminsignin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Check credentials
        if ($email === self::VALID_EMAIL && $password === self::VALID_PASSWORD) {
            // Authentication passed, start the session
            $request->session()->put('authenticated', true);

            // Redirect to admin dashboard
            return Redirect::route('admin.admindashboard');
        }

        // Authentication failed, redirect back with an error
        return Redirect::back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }

    public function showDashboard()
    {
        // Check if user is authenticated
        if (!session('authenticated')) {
            return Redirect::route('auth.signin');
        }

        // Display the dashboard
        return view('admin.admindashboard');
    }


    // Flight Data CRUD
    public function insertData(Request $req)
    {
        $flightData = DB::table("flight-data")->insert([
            'origin' => $req->origin,
            'destination' => $req->destination,
            'depart' => $req->depart,
            'arrival' => $req->arrival,
            'amount' => $req->amount,
        ]);
        return redirect()->route('admin.flights');
    }

    public function showFlights()
    {
        $data = DB::table('flight-data')->paginate(9);

        return view('admin.adminflight', ['data' => $data]);
    }

    public function deleteData(string $id)
    {
        DB::table('flight-data')->where('id', $id)->delete();

        return redirect()->route("admin.flights");
    }



    //User Data CRUD
}
