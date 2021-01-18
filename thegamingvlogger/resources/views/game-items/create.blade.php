@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('games.store') }}">
            @csrf
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select class="form-control" id="genre" name="genre">
                    @foreach($genres as $genre)
                        <option value="{{ $genre['id'] }}">{{ $genre['title'] }}</option>
                    @endforeach
                </select>
                @if ($errors->has('title'))
                    <span class="alert-danger form-check-inline">{{ $errors->first('genre') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="title">Titel:</label>
                <input type="text" class="form-control" id="title" name="title"/>
                @if ($errors->has('title'))
                    <span class="alert-danger form-check-inline">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Beschrijving:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
                @if ($errors->has('description'))
                    <span class="alert-danger form-check-inline">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Afbeelding URL:</label>
                <input type="text" class="form-control" id="image" name="image"/>
            </div>
            <div class="form-group">
                <label for="download_link">Download URL:</label>
                <input type="text" class="form-control" id="download_link" name="download_link"/>
                @if ($errors->has('download_link'))
                    <span class="alert-danger form-check-inline">{{ $errors->first('download_link') }}</span>
                @endif
            </div>
            <button type="submit" class="btn-primary btn-block">Game opslaan</button>
        </form>
    </div>
@endsection
