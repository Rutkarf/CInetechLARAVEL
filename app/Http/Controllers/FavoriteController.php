<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = auth()->user()->favorites;
        return view('favorites.index', compact('favorites'));
    }

    public function toggle(Request $request)
    {
        $user = auth()->user();
        $tmdbId = $request->input('tmdb_id');
        $type = $request->input('type');

        $favorite = Favorite::where('user_id', $user->id)
            ->where('tmdb_id', $tmdbId)
            ->where('type', $type)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'tmdb_id' => $tmdbId,
                'type' => $type,
            ]);
            return response()->json(['status' => 'added']);
        }
    }
}
