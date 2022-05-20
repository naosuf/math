<?php

namespace App\Http\Controllers;

use App\Question;
use App\Tag;
use App\Question_Tag;
use Illuminate\Http\Request;
use App\User;
use App\Answer;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{
    public function index(question $question){
        return view('index')->with([
            'questions' => $question->getPaginateByLimit(),
            ]);
    }
    
    public function show(question $question, answer $answer){
        #dd($question);
        return view('show')->with([
            'question' => $question,
            'answers' => $answer->where('question_id',  $question->id)->get(),
        ]);
    }
    
    public function create(tag $tag){
        return view('create')->with([
            'tags' => $tag->get(),    
            ]);
    }
    
    public function store(Request $request, question $question, question_tag $question_tag){
        $input = $request['question'];
        $input['user_id'] = Auth::user()->id;
        #dd($this->id);
        #$question['user_id'] = Auth::user()->id;
        $question->fill($input)->save();
        
        #dd($question->id);
        $input2 = $request['question_tag_1'];
        #dd($input2);
        $input2['question_id'] = $question->id;
        $question_tag->fill($input2)->save();
        return redirect('/');
    }
}
