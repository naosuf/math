@extends('layouts.app')

@section('content')

    <body>
        <h1>数学質問掲示板</h1>
        <div class='questions'>
            <div class='question'>
                <h2 class='title'>{{ $question->title}}</h2>
                <p class='body'>{{ $question->body }}</p>
                <p class = "tags">
                    タグ：    
                    @foreach($question->tags as $tag)
                        [<a href = "/tags/{{ $tag->id }}">{{ $tag->name }}</a>]
                    @endforeach
                </p>
                @if ( $user_id == $question->user_id )
                <a href = "/question/{{ $question->id }}/edit">質問の編集</a>
                <form action="/question/{{ $question->id }}/delete" id="form_{{ $question->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">この質問を削除</button> 
                </form>
                @endif
                <p>[<a href = "/user/{{ $question->user_id }}">投稿者：{{ $question->user->name }} </a>]</p>
                @auth
                    @if($question_user == null)
                        <form action = "/question/{{ $question->id }}/bookmark" method = "post" >
                            @csrf
                            <button type="submit">ブックマーク</button>
                        </form>
                    @else
                        <form action = "/question/{{ $question->id }}/unbookmark" method = "post" >
                            @csrf
                            @method('delete')
                            <button type="submit">ブックマークを解除</button>
                        </form>
                    @endif
                @endauth
            </div>
            <div class = "comment">
                @foreach($comments as $comment)
                    <p class = "user">・{{ $comment->body }} [<a href = "/user/{{ $comment->user_id }}">投稿者：{{ $comment->user->name }}</a>]</p>
                @endforeach
                <form action = "/question/{{ $question->id }}/comment" method="post" style="display:inline">
                    @auth   
                    @csrf
                        <input type = "hidden" name = "comment[question_id]" value = {{ $question->id }}>
                        <input type = "hidden" name = "comment[user_id]" value = {{ Auth::user()->id }}>
                        <div class = "body">
                            <textarea name ="comment[body]" placeholder="質問にコメントする"></textarea> 
                            <input type = "submit" value = "送信"/>
                        </div>
                    @endauth
                </form>
            </div>
        </div>
        
        
        <div class = "answers">
            @foreach($answers as $answer)
                <h3 class = "body"> {{ $answer->body }}</h3>
                <a href = "/user/{{ $answer->user->id }}"class = "profile">回答者：{{ $answer->user->name }}</a>
                @if( $user_id == $answer->user_id)
                    <form action = "/question/{{ $question->id }}/answer/ {{ $answer->id }}/edit" id="form_{{ $answer->id }}" method = "get" style = "display:inline">
                        @csrf
                        <button type = "submit">回答の編集</button>
                    </form>
                @endif
                @if ( $user_id == $answer->user_id )
                <form action="/answer/{{ $answer->id }}" id="form_{{ $answer->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <input type = "hidden" name = "answer[question_id]" value = {{ $question->id }}>
                    <button type="submit">削除</button> 
                </form>
                @endif
                <div class = "comment">
                    @auth   
                        @csrf
                        <input type = "hidden" name = "comment[answer_id]" value = {{ $answer->id }}>
                        <div class = "body">
                            <textarea name ="comment[body]" placeholder="この回答にコメントする"></textarea> 
                            <input type = "submit" value = "送信"/>
                        </div>
                    @endauth
                </div>
            @endforeach
        </div>
        
       <form action = "/question/{{ $question->id }}/answer" method="POST">
            @auth   
                @csrf
                <input type = "hidden" name = "answer[question_id]" value = {{ $question->id }}>
                <div class = "body">
                    <h2> この質問に答える </h2>
                    <textarea name ="answer[body]" placeholder="質問に答えよう！"></textarea> 
                    <input type = "submit" value = "送信"/>
                </div>
            @endauth
            @guest
                <div class = "guest">
                    <a href = "/login">ログインして質問に答える</a>
                </div>
            @endguest
        </form>
        
        <div class = "footer">
            <a href = "/"> 戻る </a>
        </div>
    </body>
@endsection