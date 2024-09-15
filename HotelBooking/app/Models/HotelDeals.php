<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelDeals extends Model
{
    use HasFactory;

    protected $table = 'deals'; // Ensure this matches your table name

    protected $fillable = [
        'id',
        'hotelname',
        'price',
        'location',
        'image',
        'hotelImage',
        'receptionImage',
        'roomImage1',
        'roomImage2',
        'created_at',
    ];

    public $timestamps = false; // Set to true if using Laravel's default timestamps
}
