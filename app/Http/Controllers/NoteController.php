<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tag;
use App\Question;
use App\Question_User;
use App\Answer;
use Illuminate\Support\Facades\Auth;
use App\Note;
use App\Note_Tag;
use App\Note_User;

class NoteController extends Controller
{
    public function show(Note $note){
        return view('note.show')->with([
           'note' =>$note,
        ]);
    }
    
    public function create(User $user, Tag $tag){
        return view('note.create')->with([
           'user' => $user, 
           'tags' => $tag->get(),
        ]);
    }
    
    public function store(User $user, Request $request, Note $note, Note_Tag $note_tag){
        $input_note = $request['note'];
        $input_note['user_id'] = Auth::user()->id;
        $note->fill($input_note)->save();
        
        $input_tag = $request['note_tag'];
        foreach($input_tag as $tag){
            $note_tag = new Note_Tag;
            $input_note_tag['tag_id'] = $tag;
            $input_note_tag['note_id'] = $note->id;
            $note_tag->fill($input_note_tag)->save();
        }
        
        return redirect('/note/'.$note->id);
        
    }
    
    public function edit(Note $note){
        return view('note.edit')->with([
           'note' => $note, 
        ]);
    }
    
    public function update(Request $request, Note $note){
        $input = $request['note'];
        $note->fill($input)->save();
        
        return redirect('/note/' .$note->id);
    }
    
    public function delete(Note $note){
        $note->delete();
        return redirect('/user/' .Auth::id());
        
    }
    
    
}
