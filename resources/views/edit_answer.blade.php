@extends('layouts.app')

@section('content')
    <body>
         <div class = "question">
             <h1>{{ $question->title }}</h1>
             <h2>{{ $question->body }}</h2>
         </div>
         <h3 class = "title">回答を編集</h3>
         <div class = "content">
             <form action = "/question/{{ $question->id }}/answer/{{ $answer->id }} "method = "POST">
                 @csrf
                 @method('PUT')
                 <input type = "hidden" name = "question[id]" value = {{ $question->id }}>
                 <div class = "content__body">
                     <h2> 本文</h2>
                     <input type = "text" name = "answer[body]" value = "{{ $answer ->body}}">
                 </div>
                 <input type = "submit" value = "保存">
             </form>
         </div>
    </body>
@endsection