<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\flightdata;
use App\Models\User;
use App\Models\bookflight;

class AdminController extends Controller
{
    public function showDashboard()
    {
        // Fetch data 
        // where function Role() is a scope defined in admin model
        $userCount = User::Role()->count();
        $flightCount = flightdata::count();
        $bookedFlightCount = bookflight::count();

        return view('admin.admindashboard', [
            'userCount' => $userCount,
            'flightCount' => $flightCount,
            'bookedFlightCount' => $bookedFlightCount,
        ]);
    }


    // Flight Data Insert
    public function insertData(Request $req)
    {
        flightdata::create([
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
        $data = flightdata::paginate(9);

        return view('admin.adminflight', ['data' => $data]);
    }

    //Flight Data Delete
    public function deleteData(string $id)
    {
        flightdata::FlightDelete($id);

        $message = "Flight data with id: {$id} deleted successfully";
        return redirect()->route("admin.flights")->with('success', $message);
    }

    //User Data Read
    public function showUsers()
    {
        // where function Role() is a scope defined in admin model
        $data = User::Role()->paginate(9);

        return view('admin.adminuser', ['data' => $data]);
    }

    // Delete User Data
    public function deleteUserData(string $id)
    {
        User::UserDelete($id);

        $message = "User with id: {$id} removed successfully";
        return redirect()->route("admin.userdata")->with('success', $message);
    }

    // Show Booked Flights
    public function showBookedFlights()
    {
        $data = bookflight::paginate(9);
        return view("admin.adminbookedFlights", ["data" => $data]);
    }

    // Delete Booked Flights
    public function deleteBookedFlights($id)
    {
        bookflight::BookFlightDelete($id);

        $message = "Booked Flight with id: {$id} cancelled successfully";
        return redirect()->route("admin.bookedFlights")->with('success', $message);
    }
}
