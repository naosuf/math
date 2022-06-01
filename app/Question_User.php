<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Question;
use Illuminate\Support\Facades\Auth;

class Question_User extends Model
{
    #use SoftDeletes;
    //
    
    protected $fillable = [
        'user_id',
        'question_id',
    ];
    
    protected $table = 'question_user';
    protected $dates = ['deleted_at'];
    
    public function getIds(Question $question){
        if(Auth::check()){
            return $this->where('question_id', $question->id)->where('user_id', Auth::user()->id)->first();   
        }
        else{
            return $this->get();
        }
    }
}
