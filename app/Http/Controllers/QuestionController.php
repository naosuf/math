<?php

namespace App\Http\Controllers;

use App\Question;
use App\Tag;
use App\Question_Tag;
use App\Question_User;
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
    
    public function show(Question $question, Answer $answer, Comment $comment, Tag $tag, Question_User $question_user){
        #dd($question_user->checkExistance($question));
        return view('show')->with([
            'user_id' => Auth::id(),
            'question' => $question,
            'answers' => $answer->where('question_id',  $question->id)->get(),
            'comments' => $comment->where('question_id', $question->id)->get(),
            'tags' => $tag,
            'question_user' => $question_user->getIds($question),
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
        foreach($input_tag as $tag){
            $question_tag = new Question_Tag;
            $input_question_tag['tag_id'] = $tag;
            $input_question_tag['question_id'] = $question->id;
            $question_tag->fill($input_question_tag)->save();
        }
        return redirect('/question/'.$question->id);
    }
    
    public function edit(Question $question, Tag $tag){
        return view('edit')->with([
            'question' => $question,
            'oldtags' =>$question->tags()->get(),
            'tags' => $tag->get(),
        ]);
    }
    
    public function update(Request $request, Question $question, Tag $tag, ){
    $input_question = $request['question'];
    
    $question->fill($input_question)->save();
    #dd($question);
    $oldtags = $question->question_tags;
    $input_tag = $request['question_tag'];
    for($i = 0; $i<5; $i++){
        $oldtags[$i]->tag_id = $input_tag['tag_'.$i];
        
        #dd($oldtags[4]);
        $oldtags[$i]->save();
    };
    
    
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
