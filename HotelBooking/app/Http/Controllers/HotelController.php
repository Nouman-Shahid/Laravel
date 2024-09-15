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
        $hotelDeals = HotelDeals::paginate(5); // Paginate data

        return Inertia::render('Welcome', [
            'hotelData' => $hotelData,
            'hotelDeals' => $hotelDeals->items(), // Pass items
            'pagination' => $hotelDeals->toArray(), // Pass pagination metadata
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
        // Validate the request data
        $validated = $request->validate([
            'location' => 'required|string',
            // 'arrivalDate' => 'required|date',
            // 'departureDate' => 'required|date',
        ]);

        // Extract validated data
        $location = $validated['location'];
        // $arrivalDate = $validated['arrivalDate'];
        // $departureDate = $validated['departureDate'];

        // Query the HotelDeals model with the validated data
        // Adjust the query based on your database schema
        $results = HotelDeals::where('location', $location)
            ->get();
        // ->where('arrival_date', '>=', $arrivalDate)
        // ->where('departure_date', '<=', $departureDate)

        // Return the results as JSON
        return response()->json($results);
    }
}
