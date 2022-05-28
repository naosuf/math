<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Question;
use App\User;

class TagController extends Controller
{
    public function tags(Tag $tag){
        return view('tags.tags')->with([
            'tags' => $tag->get(),    
        ]);
    }
    
    public function index(Tag $tag, Question $question){
        #dd($tag->questions()->get());
        return view('tags.index')->with([
           'questions' => $tag->getByTag(),
        ]);
    }
}
