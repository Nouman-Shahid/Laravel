<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelDeals extends Model
{
    use HasFactory;

    protected $table = 'deals';

    protected $guarded = [];

    public $timestamps = false;
}
