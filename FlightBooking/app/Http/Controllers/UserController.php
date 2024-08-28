<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    public function signup(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('user.flights');
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.flights');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    //User Dashboard Flights fetching
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
