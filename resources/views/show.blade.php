@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>数学掲示板</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <h1>数学質問掲示板</h1>
            <div class='questions'>
                <div class='question'>
                    <h2 class='title'>{{ $question->title}}</h2>
                    <p class='body'>{{ $question->body }}</p>
                </div>
            </div>
            <div class = "footer">
                <a href = "/"> 戻る </a>
            </div>
        </body>
    </html>
@endsection