<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();

        return view('songs', [
            'songs' => $songs
        ]);
    }

    public function show($id)
    {
        $song = Song::find($id);

        return view('song', [
            'song' => $song
        ]);
    }
}
