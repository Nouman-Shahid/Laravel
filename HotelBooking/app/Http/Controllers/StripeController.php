<?php

namespace App\Http\Controllers;

use Inertia\Controller;
use App\Models\HotelDeals;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Inertia\Inertia;


class StripeController extends Controller
{
    public function checkout(string $productId)
    {
        $product = HotelDeals::find($productId);

        // Ensure the product is found
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->price = $product->price * 100;

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => "{$product->hotelname} located in {$product->location}",
                            'description' => "Enjoy a comfortable one-night stay in our room with air conditioning, free Wi-Fi, and complimentary breakfast. Benefit from secure key card access, free parking, and 24-hour service. Please note, this booking is non-refundable.",
                            'images' => ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsOr15qGAmsNK5PioppawAAUhutpzPc2mS6g&s'],
                        ],
                        'unit_amount' => $product->price,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success', ['id' => $product->id]), // Ensure 'id' is correctly passed
        ]);

        return redirect()->away($session->url);
    }


    public function success($productId)
    {
        $product = HotelDeals::find($productId);

        return Inertia::render('PaymentSuccess', ['product' => $product]);
    }
}
