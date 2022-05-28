<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question, Answer $answer){
        $input = $request['answer'];
        $input['user_id'] = Auth::user()->id;
        $input['question_id'] = $question->id;
        $answer->fill($input)->save();
        return redirect('/question/'. $input['question_id']);
    }
    
    public function delete (Question $question, Answer $answer){
        $question = $answer->question;
        $answer->delete();
        
        return redirect('/question/'. $question->id);
    }
    
    public function edit(Question $question, Answer $answer, Request $request){
        return view('edit_answer')->with([
           'answer' => $answer,
           'question' => $question,
        ]);
        
    }
    
    public function update(Question $question, Answer $answer, Request $request){
        #dd($request);
        $input_answer = $request['answer'];
        $input_answer['question_id'] = $question->id;
        $answer->fill($input_answer)->save();
        return redirect ('/question/'. $question->id);
    }
}
