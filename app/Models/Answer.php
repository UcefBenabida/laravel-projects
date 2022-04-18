<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $filtable = [
        'id_answer',
        'correct',
        'id_question',
        'lib_answer'
    ];
}
