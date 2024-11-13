<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes pour les films
Route::prefix('movies')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('movies.index');
    Route::get('/{id}', [MovieController::class, 'show'])->name('movies.show');
});

// Routes pour les séries
Route::prefix('series')->group(function () {
    Route::get('/', [SeriesController::class, 'index'])->name('series.index');
    Route::get('/{id}', [SeriesController::class, 'show'])->name('series.show');
});

// Route de recherche
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Routes pour les favoris (nécessitent une authentification)
Route::middleware(['auth'])->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
});

// Routes pour les commentaires (nécessitent une authentification)
Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
});

// Routes d'authentification (générées par Laravel Breeze)
require __DIR__.'/auth.php';

