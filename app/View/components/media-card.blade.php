@props(['media', 'type'])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="https://image.tmdb.org/t/p/w500{{ $media['poster_path'] }}" alt="{{ $media['title'] ?? $media['name'] }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="font-bold text-lg mb-2">{{ $media['title'] ?? $media['name'] }}</h3>
        <p class="text-gray-700 text-sm mb-2">{{ Str::limit($media['overview'], 100) }}</p>
        <a href="{{ route($type . '.show', $media['id']) }}" class="text-blue-500 hover:underline">Voir plus</a>
        @auth
            <form action="{{ route('favorites.toggle') }}" method="POST" class="mt-2">
                @csrf
                <input type="hidden" name="tmdb_id" value="{{ $media['id'] }}">
                <input type="hidden" name="type" value="{{ $type }}">
                <button type="submit" class="text-yellow-500 hover:text-yellow-600">
                    {{ auth()->user()->favorites->contains('tmdb_id', $media['id']) ? 'Retirer des favoris' : 'Ajouter aux favoris' }}
                </button>
            </form>
        @endauth
    </div>
</div>
