<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelDeals;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function getHotels()
    {
        $hotelData = Hotel::all();
        $hotelDeals = HotelDeals::all();
        return Inertia::render('Welcome', ['hotelData' => $hotelData, 'hotelDeals' => $hotelDeals]);
    }
}
