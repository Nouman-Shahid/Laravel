<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

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


    //Stripe Functions 

    public function checkout(string $flightId)
    {
        // Fetch flight data from database
        $flight = DB::table('flight-data')->where('id', $flightId)->first();

        $flight->amount = $flight->amount * 100;

        // Set your Stripe secret key
        Stripe::setApiKey(config('stripe.sk'));

        // Create a Stripe checkout session
        $session = StripeSession::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'pkr',
                        'product_data' => [
                            'name' => "{$flight->origin} to {$flight->destination}: 1 person",
                            'description' => "Departure: {$flight->depart}, Arrival: {$flight->arrival}",
                            'images' => ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsOr15qGAmsNK5PioppawAAUhutpzPc2mS6g&s'],

                        ],
                        'unit_amount' => $flight->amount,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        // Redirect to Stripe checkout
        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('pages.success');
    }
    public function cancel()
    {

        return view('pages.cancel');
    }
}
