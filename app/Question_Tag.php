<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question_tag extends Model
{
    protected $fillable = [
        'tag_id',
        'question_id',
    ];
}
