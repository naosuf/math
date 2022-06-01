<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class note extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
