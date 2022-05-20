@extends('layouts.app')

@section('content')
    
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>数学掲示板</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
             <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>
        </head>
        <body>
            <h1>数学質問掲示板</h1>
            <div class = "create">
                <a href="/create"> 質問投稿</a>
            </div>
            <div class='questions'>
                @foreach ($questions as $question)
                    <div class='question'>
                        <h2 class='title'>
                            <a href = "/question/{{ $question->id }}"> {{ $question->title}} </a>
                        </h2>
                        <p class='body'>{{ $question->body }}</p>
                        <p class='name'>{{ $question->name }}</p>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $questions->links() }}
            </div>
        </body>
    </html>
@endsection