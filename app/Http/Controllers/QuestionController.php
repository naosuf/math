<?php

namespace App\Http\Controllers;

use App\Question;
use App\Tag;
use App\Question_Tag;
use App\Answer;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{
    public function index(Question $question, Answer $answer){
        return view('index')->with([
            'questions' => $question->getPaginateByLimit(),
            'answers'=> $answer,
            ]);
    }
    
    public function show(Question $question, Answer $answer, Comment $comment){
        #dd($question);
        return view('show')->with([
            'user_id' => Auth::id(),
            'question' => $question,
            'answers' => $answer->where('question_id',  $question->id)->get(),
            'comments' => $comment->where('question_id', $question->id)->get(),
        ]);
    }
    
    public function create(tag $tag){
        return view('create')->with([
            'tags' => $tag->get(),    
            ]);
    }
    
    public function store(Request $request, Question $question, Question_Tag $question_tag){
        $input = $request['question'];
        $input['user_id'] = Auth::user()->id;
        #dd($this->id);
        #$question['user_id'] = Auth::user()->id;
        $question->fill($input)->save();
        
        #dd($question->id);
        $input_tag = $request['question_tag'];
        #dd($input_tag);
        foreach($input_tag as $tag){
            if($tag != 0){
                $input_question_tag['tag_id'] = $tag;
                $input_question_tag['question_id'] = $question->id;
                $question_tag->fill($input_question_tag)->save();
            }
        }
        return redirect('/');
    }
    
    public function edit(Question $question){
        return view('edit')->with([
            'question' => $question,
        ]);
    }
    
    public function update(Request $request, Question $question){
    $input_question = $request['question'];
    $question->fill($input_question)->save();
    #dd($question);
    
    return redirect('/question/' . $question->id);
    }
    
    public function delete(Question $question, Answer $answer){
        $answer = $question->answers();
        $answer->delete();
        $question->delete();
        return redirect('/');
        
    }
    
    public function comment(Request $request, Question $question, Comment $comment){
        $input_comment = $request['comment'];
        #dd($input_comment);
        $input_comment['question_id'] = $question->id;
        $comment->fill($input_comment)->save();
        
        return redirect('/question/' .$question->id);
    }
}
