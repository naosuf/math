@extends('layouts.app')

@section('content')
    <body>
        <div class = "profile">
            <h2 class = "name">{{ $user->name }}</h2>
            <p class = "created_at">登録日：{{ $user->created_at }}</p>
            <p class = "comment">{{ $user->comment }}</p>
        </div>
        
        <div class = "questions">
            <p class = "title">質問一覧</p>
            @foreach($user->questions as $question)
                <a href = "/question/{{ $question->id }}">{{ $question->title }}</a>
            @endforeach
        </div>
            <div class = "bookmark">
            @if(Auth::user()->id == $user->id)
                <h3 class = "title">ブックマーク</h3>
                @foreach($bookmarks as $bookmark)
                    <h4 class = "title"><a href = "/question/{{ $bookmark->id }}">{{ $bookmark->title }}</a></h4>
                @endforeach
            @endif
        </div>
    </body>


@endsection