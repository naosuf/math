@extends('layouts.app')

@section('content')
    <body>
        <h2 class = "tags">タグ一覧</h2>
        @foreach($tags as $tag)
            <a href = "/tags/{{ $tag->id }}" >{{ $tag->name }}</a>
        @endforeach
    </body>


@endsection