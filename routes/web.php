<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('genres', [GenreController::class, 'index'])->name('genres');

Route::get('genre/{id}', [GenreController::class, 'show']);

Route::get('songs', [SongController::class, 'index'])->name('songs');

Route::get('song/{id}', [SongController::class, 'show']);

Route::get('artists', [ArtistController::class, 'index'])->name('artists');

Route::get('artist/{id}', [ArtistController::class, 'show']);

Route::get('playlists', [PlaylistController::class, 'index'])->name('playlists');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
