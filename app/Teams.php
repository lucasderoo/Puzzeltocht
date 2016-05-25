<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable=[
        'teamname',
    ];
    protected $table = 'teams';
}
