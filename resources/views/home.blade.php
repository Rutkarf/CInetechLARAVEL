@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold mb-6">Bienvenue sur La Cinétech</h1>
    
    <section class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Films populaires</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($popularMovies as $movie)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ isset($movie['poster_path']) ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : 'default_image.jpg' }}" alt="{{ $movie['title'] }}" class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">{{ $movie['title'] }}</h3>
                        <p class="text-gray-700 text-sm">{{ Str::limit($movie['overview'], 100) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
    <section class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Séries populaires</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($popularSeries as $series)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://image.tmdb.org/t/p/w500{{ $series['poster_path'] }}" alt="{{ $series['name'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">{{ $series['name'] }}</h3>
                        <p class="text-gray-700 text-sm">{{ Str::limit($series['overview'], 100) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
