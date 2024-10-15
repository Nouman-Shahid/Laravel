<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupInvite extends Model
{
    use HasFactory;
    protected $table = 'group_invitation';

    protected $guarded = [];

    public $timestamps = false;
}
