<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Question_User;
use App\Answer;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(User $user, Question $question, Answer $answer){
        return view('user')->with([
           'user' =>$user,
           'questions' => $question,
           'answers' =>$answer,
           'bookmarks' => $user->bookmarks()->paginate(5),
        ]);
    }
    
    public function bookmark(Question $question, User $user, Question_User $question_user){
        $input['question_id'] = $question->id;
        $input['user_id'] = Auth::user()->id;
        $question_user->fill($input)->save();
        
        return redirect('/question/'.$question->id);
    }
    
    public function unbookmark(Question $question, Question_User $question_user){
        #dd($question_user->where('question_id', $question->id)->where('user_id', Auth::user()->id));
        $question_user->where('question_id', $question->id)->where('user_id', Auth::user()->id)->delete();
        
        return redirect('/question/'.$question->id);
    }
}
