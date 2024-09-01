<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Mail\mailsender;
use App\Mail\signupmail;

class BookFlightController extends Controller
{
    public function checkout(string $flightId)
    {
        $flight = DB::table('flight-data')->where('id', $flightId)->first();

        $flight->amount = $flight->amount * 100;
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
        $flight = DB::table('booked-flights as b')
            ->join('flight-data as f', 'b.flight_id', '=', 'f.id')
            ->where('b.user_id', $user->id)
            ->select('f.origin', 'f.destination', 'f.depart', 'f.arrival', 'f.image', 'f.amount', 'b.id')
            ->first();

        DB::table('booked-flights')->where('id', $id)->delete();

        $message = <<<EOT
        Dear {$user->name},
        You have cancelled the flight with the following details:
        Departure: {$flight->origin} at 7:30 AM
        Arrival: {$flight->destination} at 3:00 PM
        Traveling from: {$flight->depart}
        Arrival: {$flight->arrival}
        Cost of ticket: PKR {$flight->amount}
        Best regards,
        The AirPlan Team
        EOT;

        $subject = 'Booking Cancellation: Your flight has been cancelled';

        Mail::to($user->email)->send(new SignupMail($message, $subject));

        return redirect()->route('bookedFlights')->with('success', 'Your flight has been successfully cancelled.');
    }
}
