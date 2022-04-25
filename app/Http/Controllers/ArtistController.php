<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;


class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();

        return view('artists', [
            'artists' => $artists
        ]);
    }

    public function show($id)
    {
        $artist = Artist::find($id);

        return view('artist', [
            'artist' => $artist
        ]);
    }
}
