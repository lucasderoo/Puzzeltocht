<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
   protected $fillable=[
        'tripname',
        'assignmentids'
    ];
    protected $table = 'trips';
}
