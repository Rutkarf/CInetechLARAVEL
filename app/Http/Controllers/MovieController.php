<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;

class MovieController extends Controller
{
    protected $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index()
    {
        $popularMovies = $this->tmdbService->getPopularMovies();
        return view('movies.index', compact('popularMovies'));
    }





    
    // Ajoutez d'autres méthodes pour les différentes pages
}

