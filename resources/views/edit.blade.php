@extends('layouts.app')

@section('content')
    <body>
         <h1 class = "title">質問の編集</h1>
         <div class = "content">
             <form action = "/question/{{ $question->id }}/update "method = "POST">
                 @csrf
                 @method('PUT')
                 <div class = "content__title">
                     <h2> タイトル </h2>
                     <input type="text" name ="question[title]" value="{{ $question->title}} ">
                 </div>
                 <div class = "content__body">
                     <h2> 本文</h2>
                     <input type = "text" name = "question[body]" value = "{{ $question ->body}}">
                 </div>
                <div class = "tag">
                    <p>タグを最大5つ選んでください</p>
                    @for($i=0; $i<5;$i++)
                        <select name="question_tag[tag_{{ $i }}]">
                                <option value= {{ null }}>------</option>
                            @foreach($tags as $tag)
                                @if(count($oldtags) > $i and $oldtags[$i]->id == $tag->id)
                                    <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                                @else
                                    <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    @endfor
                </div>
                 <input type = "submit" value = "保存">
             </form>
         </div>
    </body>
@endsection