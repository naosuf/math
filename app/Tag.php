<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tag extends Model
{
    use SoftDeletes;
    //
    
    public function questions(){
        return $this->belongsToMany('App\Question');
    }
    
    public function notes(){
        return $this->belongsToMany('App\Note');
    }
    
    public function getByTag(int $limit_count = 5){
         return $this->questions()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
