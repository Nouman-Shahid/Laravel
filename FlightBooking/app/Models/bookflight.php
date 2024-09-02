<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookflight extends Model
{
    use HasFactory;

    protected $table = 'booked-flights';
    protected $guarded = [];
}
