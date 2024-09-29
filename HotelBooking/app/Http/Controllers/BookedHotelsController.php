<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\BookedHotels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookedHotelsController extends Controller
{
    public function Cart()
    {
        $user = Auth::user();

        // Get booked hotels with deal information using a join
        $bookedHotels = DB::table('bookedhotels')
            ->join('deals', 'bookedhotels.hotel_id', '=', 'deals.id')
            ->where('bookedhotels.user_id', $user->id)
            ->select('deals.hotelname', 'deals.location', 'deals.image', 'deals.price')
            ->get();

        return Inertia::render('Cart', ['bookedHotels' => $bookedHotels]);
    }
}
