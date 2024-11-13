@props(['comment'])

<div class="bg-gray-100 p-4 rounded-lg mb-4">
    <p class="font-semibold">{{ $comment->user->name }}</p>
    <p class="text-gray-600 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
    <p class="mt-2">{{ $comment->content }}</p>
    
    @auth
        <form action="{{ route('comments.reply', $comment) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="content" rows="2" class="w-full p-2 border rounded" placeholder="Répondre à ce commentaire..."></textarea>
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded text-sm">Répondre</button>
        </form>
    @endauth
    
    @if($comment->replies->count() > 0)
        <div class="ml-8 mt-4">
            @foreach($comment->replies as $reply)
                <x-comment :comment="$reply" />
            @endforeach
        </div>
    @endif
</div>
