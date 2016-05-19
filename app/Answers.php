<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
	protected $fillable=[
        'answer_1',
        'answer_2',
        'answer_3',
        'correct_answer'
    ];
    protected $table = 'answers';
}
