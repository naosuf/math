<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use SoftDeletes;
    //
    protected $fillable=[
        'body',
        'question_id',
        'user_id',
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
