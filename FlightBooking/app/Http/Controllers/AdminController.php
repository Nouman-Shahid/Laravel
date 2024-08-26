<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Hardcoded credentials
    private const VALID_EMAIL = 'admin@gmail.com';
    private const VALID_PASSWORD = 'admin123'; // This is the hardcoded password

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

    public function showFlights()
    {
        $data = DB::table('flight-data')->paginate(10);

        return view('admin.adminflight', ['data' => $data]);
    }
}
