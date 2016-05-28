<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamsusers extends Model
{
    protected $fillable=[
		'teamids',
		'userids',
		'tripids',
		'score',
    ];
    protected $table = 'teamsusers';
}
