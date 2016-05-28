<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    protected $fillable=[
		'tripid',
    ];
    protected $table = 'sessions';
}
