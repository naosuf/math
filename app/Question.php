<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
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
}
