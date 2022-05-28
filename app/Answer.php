<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'body',
        'user_id',   
        'question_id',
    ];
    
    public function question(){
        return $this->belongsTo('App\Question');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
