@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/3">
            <img src="https://image.tmdb.org/t/p/w500{{ $series['poster_path'] }}" alt="{{ $series['name'] }}" class="w-full rounded-lg shadow-lg">
        </div>
        <div class="md:w-2/3 md:pl-8 mt-4 md:mt-0">
            <h1 class="text-3xl font-bold mb-4">{{ $series['name'] }}</h1>
            <p class="text-gray-600 mb-4">{{ $series['first_air_date'] }} | {{ implode(', ', array_column($series['genres'], 'name')) }}</p>
            <p class="mb-4">{{ $series['overview'] }}</p>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Casting principal</h2>
                <p>{{ implode(', ', array_slice(array_column($series['credits']['cast'], 'name'), 0, 5)) }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Créateur(s)</h2>
                <p>{{ implode(', ', array_column($series['created_by'], 'name')) }}</p>
            </div>
        </div>
    </div>
    
    <section class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Séries similaires</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($similarSeries as $similarSeries)
                <x-media-card :media="$similarSeries" type="series" />
            @endforeach
        </div>
    </section>
    
    <section class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Commentaires</h2>
        @auth
            <form action="{{ route('comments.store') }}" method="POST" class="mb-4">
                @csrf
                <input type="hidden" name="tmdb_id" value="{{ $series['id'] }}">
                <input type="hidden" name="type" value="series">
                <textarea name="content" rows="3" class="w-full p-2 border rounded" placeholder="Laissez un commentaire..."></textarea>
                <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Poster</button>
            </form>
        @endauth
        @foreach($comments as $comment)
            <x-comment :comment="$comment" />
        @endforeach
    </section>
</div>
@endsection
