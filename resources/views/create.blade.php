@extends('layouts.app')

@section('content')


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
                <p>タグを最大5つ選んでください</p>
                @for($i=1; $i<6;$i++)
                    <select name="question_tag[tag_{{ $i }}]">
                            <option value="0">------</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                @endfor
            </div>
            
            
            <input type = "submit" value = "保存"/>
        </form>
        <div class = "back ">[<a href = "/">back</a>]</div>
    </body>
@endsection