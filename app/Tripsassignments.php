<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tripsassignments extends Model
{
    protected $fillable=[
		'tripid',
    ];
    protected $table = 'tripsessions';
}
