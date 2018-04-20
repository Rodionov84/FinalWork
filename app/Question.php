<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";

    protected $fillable = [
        'status',
        'user_name',
        'user_email',
        'category_id',
        'question',
        'response'
    ];
}
