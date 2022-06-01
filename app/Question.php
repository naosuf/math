<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'title',
        'body',
        'user_id'
    ];
    
    public function getPaginateByLimit(int $limit_count = 10){
        return $this->orderBy('updated_at', 'desc')->paginate($limit_count);
    }
    
    public function answers(){
        return $this->hasMany('App\Answer');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    
    public function bookmarked(){
        $this->belongsToMany('App\User');
    }
    
    public function question_tags(){
        return $this->hasMany('App\Question_Tag');
    }
}
