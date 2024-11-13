@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Résultats de recherche pour "{{ $query }}"</h1>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach($results as $result)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://image.tmdb.org/t/p/w500{{ $result['poster_path'] }}" alt="{{ $result['title'] ?? $result['name'] }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-bold text-lg mb-2">{{ $result['title'] ?? $result['name'] }}</h3>
                <p class="text-gray-700 text-sm">{{ Str::limit($result['overview'], 100) }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
