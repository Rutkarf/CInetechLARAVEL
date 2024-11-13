<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;
use vendor\Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index()
    {
        $popularMovies = $this->tmdbService->getPopularMovies();
        $popularSeries = $this->tmdbService->getPopularSeries();
        return view('home', compact('popularMovies', 'popularSeries'));
    }
}

