@extends('layouts.app')

@section('content')
    <body>
         <h1 class = "title">編集画面</h1>
         <div class = "content">
             <form action = "/note/{{ $note->id }}/update "method = "POST">
                 @csrf
                 @method('PUT')
                 <div class = "content__title">
                     <h2> タイトル </h2>
                     <input type="text" name ="note[title]" value="{{ $note->title}} ">
                 </div>
                 <div class = "content__body">
                     <h2> 本文</h2>
                     <input type = "text" name = "note[body]" value = "{{ $note->body}}">
                 </div>
                 <input type = "submit" value = "保存">
             </form>
         </div>
    </body>
@endsection