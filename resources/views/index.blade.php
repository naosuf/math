@extends('layouts.app')

@section('content')
    
    
    <h1>数学質問掲示板</h1>
    <div class = "create">
        <a href="/question/create"> 質問投稿</a>
    </div>
    <div class = "tags">
        <a href="/tags"> タグ一覧</a>
    </div>
    <div class='questions'>
        @foreach ($questions as $question)
            <div class='question'>
                <h2 class='title'>
                    <a href = "/question/{{ $question->id }}"> {{ $question->title}} </a>
                </h2>
                <p class='body'>{{ $question->body }}</p>
                <p class='name'>{{ $question->name }}</p>
                @if($question->updated_at > $question->created_at)    
                    <p class='date'>更新日：{{ $question->updated_at }}</p>
                @else
                    <p class='date'>投稿日：{{ $question->created_at }}</p>
                @endif
                
                <p class = "answer">回答数：{{ count($question->answers) }} </p>
                
            </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $questions->links() }}
    </div>

@endsection