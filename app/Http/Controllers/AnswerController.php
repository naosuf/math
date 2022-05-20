<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request, Answer $answer){
        $input = $request['answer'];
        $input['user_id'] = Auth::user()->id;
        #$input['question_id'] = $question_id;
        #dd($request);
        #dd($question);
        #$question['user_id'] = Auth::user()->id;
        $answer->fill($input)->save();
        return redirect('/question/'. $question_id);
    }
}
