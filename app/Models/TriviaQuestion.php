<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TriviaQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'category','difficulty','question','correct_answer','incorrect_answers'
    ];

    protected $casts= [

        'incorrect_answers'=>'array'
    ];
}
