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
<p>{{ $gameItem -> genre -> title}}</p>
<p>{{ $gameItem -> description }}</p>
<p style="margin-top: 1em">
    @foreach( $gameItem->tags as $tag)
        <a href="{{ route('games', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
    @endforeach
</p>
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
