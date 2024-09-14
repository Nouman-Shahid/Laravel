<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout()
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'pkr',
                        'product_data' => [
                            'name' => "Room 1",
                            'description' => "Room is beautiful",
                            'images' => ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsOr15qGAmsNK5PioppawAAUhutpzPc2mS6g&s'],
                        ],
                        'unit_amount' => 200000,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success',),
            'cancel_url' => route('cancel'),
        ]);

        return redirect()->away($session->url);
    }
    public function success()
    {
        echo 'Payment Success';
    }
    public function cancel()
    {
        echo 'Payment Cancel';
    }
}
