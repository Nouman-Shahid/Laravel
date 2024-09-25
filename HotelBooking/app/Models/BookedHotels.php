<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedHotels extends Model
{
    use HasFactory;
    protected $table = 'bookedhotels';

    protected $guarded = [];

    public $timestamps = true;
}
