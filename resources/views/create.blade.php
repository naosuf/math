@extends('layouts.app')

@section('content')

    <!DOCTYTPE HTML>
    <html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset = "utf-8">
            <title> 数学質問掲示板</title>
        </head>
        <body>
            <h1> 質問をしよう！</h1>
            <form action = "/" method="POST">
                @csrf
                <div class = "title">
                    <h2>タイトル </h2>
                    <input type = "text " name = "question[title]" placeholder="タイトル"/>
                </div>
                <div class = "body">
                        <h2> 本文 </h2>
                        <textarea name ="question[body]" placeholder="本文"></textarea> 
                </div>
                <div class = "tag">
                    @foreach ($tags as $tag)
                        <p class = "name"> {{ $tag->name }}</p>
                    @endforeach
                </div>
                
                
                <input type = "submit" value = "保存"/>
            </form>
            <div class = "back ">[<a href = "/">back</a>]</div>
        </body>
    </html>
@endsection