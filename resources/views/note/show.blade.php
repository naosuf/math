@extends('layouts.app')

@section('content')
     <body>
        <h1>数学質問掲示板</h1>
        <div class='question'>
            <h2 class='title'>{{ $note->title}}</h2>
            <p class='body'>{{ $note->body }}</p>
            <p class = "tags">
                タグ：    
                @foreach($note->tags as $tag)
                    [<a href = "/tags/{{ $tag->id }}">{{ $tag->name }}</a>]
                @endforeach
            </p>
        </div>
        
        @if (Auth::id() == $note->user_id )
            <a href = "/note/{{ $note->id }}/edit">ノートの編集</a>
            
            <form action="/note/{{ $note->id }}/delete" id="form_{{ $note->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">このノートを削除</button> 
            </form>
        @endif
    </body>
    
    <div class = "footer">
        <a href = "/"> 戻る </a>
    </div>

@endsection