<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamsusers extends Model
{
    protected $fillable=[
		'teamids',
		'userids',
    ];
    protected $table = 'teamsusers';
}
