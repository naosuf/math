<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question_User extends Model
{
    use SoftDeletes;
    //
    
    protected $fillable = [
        'user_id',
        'question_id',
    ];
    
    protected $table = 'question_user';
}
