@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Games</h1>
        <a class="nav-link float-right" href="{{route('games.create')}}">Maak een nieuwe game entry aan</a>
    </header>

    <div class="container">
{{--                @if ($message = session::get('success'))--}}
{{--                    <div class="alert alert-success alert-block">--}}
{{--                        <strong>{{$message}}</strong>--}}
{{--                    </div>--}}
{{--                @endif--}}
        <div class="row">
            @foreach($gameItems as $gameItem)
{{--                <li class="first">--}}
{{--                    <h3>--}}
{{--                        <a href="/blogs/{{ $blogItem->id }}">{{ $blogItem->title }}</a>--}}
{{--                    </h3>--}}
{{--                    <img class="card-img" src="{{$blogItem['image']}}" alt="{{$blogItem['title']}}"/>--}}
{{--                    <p class="card-text">{{$blogItem['description']}}</p>--}}
{{--                </li>--}}

                                <div class="col-sm card border-0">
                                    <h2 class="card-title">{{$gameItem['title']}}</h2>
                                    <p class="card-text">{{$gameItem['description']}}</p>
                                    <img class="card-img" src="{{$gameItem['image']}}" alt="{{$gameItem['title']}}"/>
                                    <a class="btn btn-light" href="{{route('games.show', $gameItem['id'])}}">Lees meer</a>
        </div>
        @endforeach
    </div>
    </div>
@endsection
