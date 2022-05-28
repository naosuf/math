<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tag extends Model
{
    use SoftDeletes;
    //
    protected $table = 'tags';
    public function questions(){
        return $this->belongsToMany('App\Question');
    }
    public function getByTag(int $limit_count = 5){
         return $this->questions()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
