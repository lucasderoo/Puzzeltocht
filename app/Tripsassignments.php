<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tripsassignments extends Model
{
    protected $fillable=[
		'tripids',
		'assignmentsids',
    ];
    protected $table = 'tripsassignments';
}
