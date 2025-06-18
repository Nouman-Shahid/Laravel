<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompletedNotes extends Model
{
    protected $table = 'completed';
    protected $guarded = [];
    public $timestamps = false;
}
