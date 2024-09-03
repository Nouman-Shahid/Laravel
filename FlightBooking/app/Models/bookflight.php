<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookflight extends Model
{
    use HasFactory;

    protected $table = 'booked-flights';
    protected $guarded = [];

    public function flightData()
    {
        return $this->belongsTo(flightdata::class, 'flight_id', 'id');
    }

    public function scopeBookFlightDelete($query, $id)
    {
        return $query->where("id", $id)->delete();
    }
}
