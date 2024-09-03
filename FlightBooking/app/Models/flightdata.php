<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flightdata extends Model
{
    use HasFactory;
    protected $table = "flight-data";
    protected $guarded = [];

    public function scopeFlightDelete($query, $flight_id)
    {
        return $query->where("id", $flight_id)->delete();
    }
    public function scopeShowSingleFlight($query, $flight_id)
    {
        return $query->where('id', $flight_id)->first();
    }
}
