<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question_Tag extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'tag_id',
        'question_id',
    ];
    
    protected $table = 'question_tag';
}
