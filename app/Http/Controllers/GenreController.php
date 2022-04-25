<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return view('genres',[
            'genres' => $genres
        ]);
    }

    public function show($id)
    {
        $genre = Genre::find($id);

        return view('genre', [
            'genre' => $genre
        ]);
    }
}
