<?php

namespace App\Http\Controllers;

use App\Mail\mailsender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

    public function logout()
    {
        Auth::logout();

        return redirect()->route('view.home');
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
        $flight = DB::table('flight-data')->where('id', $flightId)->first();

        // Set the amount in PKR
        $flight->amount = $flight->amount * 100;

        //Stripe secret key
        Stripe::setApiKey(config('stripe.sk'));

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
            'success_url' => route('success', ['flightid' => $flightId]),
            'cancel_url' => route('cancel'),
        ]);

        return redirect()->away($session->url);
    }


    public function success($flightid)
    {
        $flight = DB::table('flight-data')->where('id', $flightid)->first();
        if (!$flight) {
            return redirect()->back()->withErrors('Flight not found.');
        }

        $user = Auth::user();

        DB::table('booked-flights')->insert([
            'user_id' => $user->id,
            'user_email' => $user->email,
            'flight_id' => $flightid,
        ]);

        $message = <<<EOT
Dear {$user->name},

Thank you for choosing AirPlan for your flight.

Here are the details of your flight:

Your flight will depart from {$flight->origin} at 7:30 AM and arrive at {$flight->destination} at 3:00 PM.
You will be traveling from {$flight->depart} to {$flight->arrival}.
The cost of your flight ticket is PKR {$flight->amount}.

We wish you a safe and enjoyable journey!

Best regards,
The AirPlan Team
EOT;


        $subject = 'Booking Confirmation: Your Flight with AirPlan';

        Mail::to($user->email)->send(new mailsender($message, $subject));

        return view('pages.success', ['data' => $flight]);
    }


    public function cancel()
    {

        return view('pages.cancel');
    }


    public function cart()
    {
        $user = Auth::user();
        $results = DB::table('booked-flights as b')
            ->join('flight-data as f', 'b.flight_id', '=', 'f.id')
            ->where('b.user_id', $user->id)
            ->select('f.origin', 'f.destination', 'f.depart', 'f.arrival', 'f.image', 'f.amount', 'b.id')
            ->get();
        return view('pages.bookedFlights', ['data' => $results]);
    }
    public function cancelFlight($id)
    {
        $user = Auth::user();
        $results = DB::table('booked-flights as b')->where('id', $id)->delete();

        return redirect()->route('bookedFlights', ['data' => $results]);
    }
}
