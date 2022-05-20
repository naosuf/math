@extends('layouts.app')

@section('content')

    <!DOCTYPE HTML>
    <html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset = "utf-8">
            <title> 数学質問掲示板</title>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>
        </head>
        
        <body>
            <h1> 質問をしよう！</h1>
            <form action = "/question" method="POST">
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
                    <h2>タグを最大5つ選んでください</h2>
                    <select name="question_tag_1[tag_id]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <select name="question_tag_2[tag_id]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <select name="question_tag_3[tag_id]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <select name="question_tag_4[tag_id]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <select name="question_tag_5[tag_id]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                
                <input type = "submit" value = "保存"/>
            </form>
            <div class = "back ">[<a href = "/">back</a>]</div>
        </body>
    </html>
@endsection