<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;
use Illuminate\Http\Request;
use App\Models\Comment;


class SeriesController extends Controller
{
    protected $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index()
    {
        $popularSeries = $this->tmdbService->getPopularSeries();
        return view('series.index', compact('popularSeries'));
    }

    public function show($id)
    {
        // Récupérer et afficher les détails de la série
        $series = $this->tmdbService->getSeriesDetails($id);
        $similarSeries = $this->tmdbService->getSimilarSeries($id);
        $comments = Comment::where('tmdb_id', $id)->where('type', 'series')->get();

        return view('series.show', compact('series', 'similarSeries', 'comments'));
    }
}
