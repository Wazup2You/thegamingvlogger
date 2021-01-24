@extends('layout')

@section('content')
    <h1 class="heading has-text-weight-bold is-size-4">Creating new game entry:</h1>
    <div class="container">
        <form method="post" action="{{ route('games.store') }}">
            @csrf
            <div class="field">
                <label class="label"for="genre">Genre:</label>

                <div class="control">
                    <select class="form-control" id="genre" name="genre">
                        @foreach($genres as $genre)
                            <option value="{{ $genre['id'] }}">{{ $genre['title'] }}</option>
                        @endforeach
                    </select>
                    @error('genre')
                    <p class="help is-danger">{{ $errors->first('genre') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="title">Titel:</label>

                <div class="control">
                    <input type="text" class="input @error('title') is-danger @enderror" id="title" name="title" value="{{ old('title') }}"/>

                    @error('title')
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="description">Beschrijving:</label>

                <div class="control">
                    <textarea type="text" class="textarea @error('description') is-danger @enderror" id="description" name="description" >{{ old('description') }}</textarea>

                    @error('description')
                    <p class="help is-danger">{{ $errors->first('description') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="tag">Tags:</label>

                <div class="select is-multiple control">
                    <select
                        name="tags[]"
                        multiple
                    >
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>

                    @error('tags')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="field">
                <label class="label" for="image">Afbeelding URL:</label>

                <div class="control">
                    <input type="text" class="input @error('image') is-danger @enderror" id="image" name="image" value="{{ old('image') }}"/>

                    @error('image')
                    <p class="help is-danger">{{ $errors->first('image') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="download_link">Download URL:</label>

                <div class="control">
                    <input type="text" class="input @error('download_link') is-danger @enderror" id="download_link" name="download_link" value="{{ old('download_link') }}"/>

                    @error('download_link')
                    <p class="help is-danger">{{ $errors->first('download_link') }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-primary btn-block">Game opslaan</button>
        </form>
    </div>
@endsection
