<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbService
{
    protected $baseUrl = 'https://api.themoviedb.org/3';
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
    }

    public function getPopularMovies()
    {
        return $this->get('/movie/popular');
    }

    public function getPopularSeries()
    {
        return $this->get('/tv/popular');
    }

    public function getMovieDetails($id)
    {
        return $this->get("/movie/{$id}", ['append_to_response' => 'credits,similar']);
    }

    public function getSeriesDetails($id)
    {
        return $this->get("/tv/{$id}", ['append_to_response' => 'credits,similar']);
    }

    public function getSimilarMovies($id)
    {
        return $this->get("/movie/{$id}/similar");
    }

    public function getSimilarSeries($id)
    {
        return $this->get("/tv/{$id}/similar");
    }

    public function search($query)
    {
        return $this->get('/search/multi', ['query' => $query]);
    }

    public function getMovieCredits($id)
    {
        return $this->get("/movie/{$id}/credits");
    }

    public function getSeriesCredits($id)
    {
        return $this->get("/tv/{$id}/credits");
    }

    public function getMovieReviews($id)
    {
        return $this->get("/movie/{$id}/reviews");
    }

    public function getSeriesReviews($id)
    {
        return $this->get("/tv/{$id}/reviews");
    }

    public function getMovieVideos($id)
    {
        return $this->get("/movie/{$id}/videos");
    }

    public function getSeriesVideos($id)
    {
        return $this->get("/tv/{$id}/videos");
    }

    public function getMovieImages($id)
    {
        return $this->get("/movie/{$id}/images");
    }

    public function getSeriesImages($id)
    {
        return $this->get("/tv/{$id}/images");
    }

    protected function get($endpoint, $params = [])
    {
        $response = Http::get("{$this->baseUrl}{$endpoint}", array_merge([
            'api_key' => $this->apiKey,
            'language' => 'fr-FR',
        ], $params));

        return $response->json();
    }
}

