<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SelectionController;
use App\Http\Controllers\SessionController;
use App\Models\Playlist;
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
// routes voor de genres
Route::get('genres', [GenreController::class, 'index'])->name('genres');

Route::get('genre/{id}', [GenreController::class, 'show']);

Route::get('genres/creategenre', [GenreController::class, 'create']);

Route::post('genres/creategenre/store', [GenreController::class, 'store']);

Route::get('genre/edit/{id}', [GenreController::class, 'edit']);

Route::put('genre/edit/{id}/update', [GenreController::class, 'update']);

Route::get('genre/delete/{id}', [GenreController::class, 'destroy']);

//routes voor de songs
Route::get('songs', [SongController::class, 'index'])->name('songs');

Route::get('song/{id}', [SongController::class, 'show']);

Route::get('songs/createsong', [SongController::class, 'create']);

Route::post('songs/createsong/store', [SongController::class, 'store']);

Route::get('song/edit/{id}', [SongController::class, 'edit']);

Route::put('song/edit/{id}/update', [SongController::class, 'update']);

Route::get('song/delete/{id}', [SongController::class, 'destroy']);

//routes voor de artists
Route::get('artists', [ArtistController::class, 'index'])->name('artists');

Route::get('artist/{id}', [ArtistController::class, 'show']);

Route::get('artists/createartist', [ArtistController::class, 'create']);

Route::post('artists/createartist/store', [ArtistController::class, 'store']);

Route::get('artist/edit/{id}', [ArtistController::class, 'edit']);

Route::put('artist/edit/{id}/update', [ArtistController::class, 'update']);

Route::get('artist/delete/{id}', [ArtistController::class, 'destroy']);

//routes voor de selection

Route::get('selection', [SelectionController::class, 'index'])->name('selection');

Route::get('selection/delete/{id}', [SelectionController::class, 'remove']);

// routes voor de sessions

//laat alle songs in de sessie zien
Route::get('/session/get', [SessionController::class, 'getSessionData'])->name('session.get');

// http://127.0.0.1:8000/addSong/1 : voeg een song toe aan de sessie
Route::get('addSong/{song_id}', [SessionController::class, 'addSongIdToSession']);

// Route::get('/session/delete', [SessionController::class, 'deleteSessionData'])->name('session.delete');

Route::get('playlists', [PlaylistController::class, 'index'])->name('playlists');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
