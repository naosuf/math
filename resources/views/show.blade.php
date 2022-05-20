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
            <div class='questions'>
                <div class='question'>
                    <h2 class='title'>{{ $question->title}}</h2>
                    <p class='body'>{{ $question->body }}</p>
                </div>
            </div>
            
            <div class = "answers">
                @foreach($answers as $answer)
                    <h3 class = "body"> {{ $answer->body }}</h3>
                    <h1>削除</h1>
                @endforeach
            </div>
            
           <form action = "/answer" method="POST">
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
    </html>
@endsection