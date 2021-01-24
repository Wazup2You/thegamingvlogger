@extends('layout')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>Document</title>
</head>
<body>
<h1>My Games Post</h1>
<p>{{ $gameItem -> title }}</p>
<p><h1>Created by: </h1>{{ $gameItem -> user -> name}}</p>
<p>{{ $gameItem -> genre -> title}}</p>
<p>{{ $gameItem -> description }}</p>
<p style="margin-top: 1em">
    @foreach( $gameItem->tags as $tag)
        <a href="{{ route('games', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
    @endforeach
</p>
<div>
@can('update-item', $gameItem)
<form action="{{route('games.edit', $gameItem->id)}}">
    <button
        type="submit"
        class="btn p-0 text-muted"
    >Edit
    </button>
</form>
@endcan
</div>
<div>
    @can('update-item', $gameItem)
        <form method="get" action="{{route('games.destroy', $gameItem->id)}}">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="btn p-0 text-muted"
            >Delete
            </button>
        </form>
    @endcan
</div>
{{--<div>--}}
{{--    @can('edit_game')--}}
{{--        <li>--}}
{{--            <a href="#">Edit Game</a>--}}
{{--        </li>--}}
{{--    @endcan--}}
{{--</div>--}}
{{--<p>--}}
{{--<aside>--}}
{{--    <ul>--}}
{{--        @foreach($gameItem->genres as $genre)--}}
{{--            <li><a href="{{ route('games', ['genre' => $genre->title]) }}">{{ $genre->title }}</a> </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--</aside>--}}
{{--</p>--}}

</body>
@endsection
