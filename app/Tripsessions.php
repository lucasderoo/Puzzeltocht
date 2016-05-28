<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tripsessions extends Model
{
     protected $fillable=[
		'tripid',
    ];
    protected $table = 'tripsessions';
}
