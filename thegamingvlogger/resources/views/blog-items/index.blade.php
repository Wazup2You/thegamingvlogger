@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Gaming Blogs</h1>
{{--        <a class="nav-link float-right" href="{{route('blog-items.create')}}">Maak een nieuwe gaming blog aan</a>--}}
    </header>

    <div class="container">
{{--        @if ($message = session::get('success'))--}}
{{--            <div class="alert alert-success alert-block">--}}
{{--                <strong>{{$message}}</strong>--}}
{{--            </div>--}}
{{--        @endif--}}
        <div class="row">
            @foreach($blogItems as $blogItem)
                <li class="first">
                    <h3>
                        <a href="/blogs/{{ $blogItem->id }}">{{ $blogItem->title }}</a>
                    </h3>
                    <img class="card-img" src="{{$blogItem['image']}}" alt="{{$blogItem['title']}}"/>
                    <p class="card-text">{{$blogItem['description']}}</p>
                </li>

{{--                <div class="col-sm card border-0">--}}
{{--                    <h2 class="card-title">{{$blogItem['title']}}</h2>--}}
{{--                    <p class="card-text">{{$blogItem['description']}}</p>--}}
{{--                    <img class="card-img" src="{{$blogItem['image']}}" alt="{{$blogItem['title']}}"/>--}}
{{--                    <a class="btn btn-light" href="{{route('blog-items.show', $blogItem['id'])}}">Lees meer</a>--}}
                </div>
            @endforeach
        </div>
    </div>
    @endsection
