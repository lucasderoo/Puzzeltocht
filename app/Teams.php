<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable=[
        'teamname',
        'teamsize',
        'score',
        'tripid',
    ];
    protected $table = 'teams';
}
