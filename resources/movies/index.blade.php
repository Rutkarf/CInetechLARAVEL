@extends('layouts.app')

@section('content')
    <h1>Films populaires</h1>
    <div class="movie-grid">
        @foreach($popularMovies as $movie)
            <div class="movie-card">
                <img src="https://image.tmdb.org/t/p/w300{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
                <h2>{{ $movie['title'] }}</h2>
            </div>
        @endforeach
    </div>
@endsection
