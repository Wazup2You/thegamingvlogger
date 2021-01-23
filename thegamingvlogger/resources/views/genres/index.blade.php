@extends('layout')

@section('content')

    <header class="jumbotron">
        <h1 class="modal-title float-left">Games</h1>
        <a class="nav-link float-right" href="{{route('games.create')}}">Maak een nieuwe game entry aan</a>
    </header>

    <aside>
        <ul>
            @foreach($genres as $genre)
                <li><a href="#{{ $genre->title }}">{{ $genre->title }}</a> </li>
            @endforeach
        </ul>
    </aside>

    <div class="container">

        @foreach($genres as $genre)
            <h2 id="{{$genre->title}}">{{$genre->title}}</h2>
{{--            <h2>{{ $genre->gameItems()->toSql() }}</h2>--}}
        <div class="row">
        @foreach($genre->gameItems as $gameItem)
                <div class="col-sm card border-0">
                    <h3 class="card-title">{{$gameItem->title}}</h3>
                    <p>
                        <b>{{ $gameItem->genre->title }}</b>
                    </p>
                    <p class="card-text">{{$gameItem->description}}</p>
                    <img class="card-img" src="{{$gameItem->image}}" alt="{{$gameItem->title}}"/>
                    <a class="btn btn-light" href="{{route('games.show', $gameItem->id)}}">Lees meer</a>
                </div>
            @endforeach
        </div>
        @endforeach

    </div>

@endsection
