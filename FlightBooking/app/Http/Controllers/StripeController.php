<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class StripeController extends Controller
{
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
