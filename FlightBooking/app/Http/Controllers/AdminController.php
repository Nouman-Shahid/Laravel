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
            'password' => 'required|min:8',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === self::VALID_EMAIL && $password === self::VALID_PASSWORD) {
            $request->session()->put('authenticated', true);

            return Redirect::route('admin.admindashboard');
        }
    }

    public function showDashboard()
    {
        // Check if user is authenticated
        if (!session('authenticated')) {
            return Redirect::route('view.signin');
        }


        // Fetch data
        $userCount = DB::table('users')->count();
        $flightCount = DB::table('flight-data')->count();
        $bookedFlightCount = DB::table('booked-flights')->count();

        return view('admin.admindashboard', [
            'userCount' => $userCount,
            'flightCount' => $flightCount,
            'bookedFlightCount' => $bookedFlightCount,
        ]);
    }


    // Flight Data Insert
    public function insertData(Request $req)
    {
        DB::table("flight-data")->insert([
            'origin' => $req->origin,
            'destination' => $req->destination,
            'depart' => $req->depart,
            'arrival' => $req->arrival,
            'amount' => $req->amount,
            'image' => $req->image
        ]);
        $message = "Flight data added successfully";
        return redirect()->route("admin.flights")->with('success', $message);
    }

    //Fight Data Read
    public function showFlights()
    {
        $data = DB::table('flight-data')->paginate(9);

        return view('admin.adminflight', ['data' => $data]);
    }

    //Flight Data Delete
    public function deleteData(string $id)
    {
        DB::table('flight-data')->where('id', $id)->delete();

        $message = "Flight data with id: {$id} deleted successfully";
        return redirect()->route("admin.flights")->with('success', $message);
    }

    //User Data Read
    public function showUsers()
    {
        $data = DB::table('users')->paginate(9);

        return view('admin.adminuser', ['data' => $data]);
    }

    // Delete User Data
    public function deleteUserData(string $id)
    {
        DB::table('users')->where('id', $id)->delete();

        $message = "User with id: {$id} removed successfully";
        return redirect()->route("admin.userdata")->with('success', $message);
    }

    // Show Booked Flights
    public function showBookedFlights()
    {
        $data = DB::table("booked-flights")->paginate(9);
        return view("admin.adminbookedFlights", ["data" => $data]);
    }

    // Delete Booked Flights
    public function deleteBookedFlights($id)
    {
        $data = DB::table("booked-flights")->where("id", $id)->delete();

        $message = "Booked Flight with id: {$id} cancelled successfully";
        return redirect()->route("admin.bookedFlights")->with('success', $message);
    }
}
