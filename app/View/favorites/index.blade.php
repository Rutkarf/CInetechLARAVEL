@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Mes favoris</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($favorites as $favorite)
            <x-media-card :media="$favorite->media" :type="$favorite->type" />
        @endforeach
    </div>
</div>
@endsection
