<?php

namespace App\Http\Controllers;

use App\question;
use App\tag;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(question $question){
        return view('index')->with([
            'questions' => $question->get(),
            ]);
    }
    
    public function show(question $question){
        return view('show')->with(['question' => $question]);
    }
    
    public function create(tag $tag){
        return view('create')->with([
            'tags' => $tag->get(),    
            ]);
    }
    
    public function store(Request $request, question $question){
        $input = $request['question'];
        $question->fill($input)->save();
        return redirect('/' .$post->id);
    }
}
