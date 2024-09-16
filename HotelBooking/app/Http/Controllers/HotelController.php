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
        $hotelDeals = HotelDeals::orderBy('id')->paginate(5);

        return Inertia::render('Welcome', [
            'hotelData' => $hotelData,
            'hotelDeals' => $hotelDeals->items(),
            'pagination' => $hotelDeals->toArray(),
        ]);
    }

    public function getSingleHotels($id)
    {
        $hotelDeals = HotelDeals::find($id);

        if (!$hotelDeals) {
            return abort(404, 'Hotel deal not found.');
        }

        return Inertia::render('ProductDescription', ['product' => $hotelDeals]);
    }
    public function search(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string',
        ]);

        $location = $validated['location'];

        $results = HotelDeals::where('location', 'like', "%{$location}%")->get();
        $count = $results->count();

        return Inertia::render('SearchedResults', [
            'results' => $results,
            'count' => $count,
        ]);
    }
}
