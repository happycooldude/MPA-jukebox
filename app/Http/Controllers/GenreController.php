<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return view('genres', [
            'genres' => $genres
        ]);
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        $songs = $genre->songs;

        return view('genre', [
            'songs' => $songs,
            'genre' => $genre
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();

        return view('cruds.genrecrud.creategenre', [
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();

        return redirect('genres');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cruds.genrecrud.edit', [
            'genre' => Genre::find($id),
        ]);
        return redirect('genres');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre->update([
            $genre->name = $request->name,
            $genre->save(),
        ]);

        return redirect('genres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();

        return redirect('genres');
    }
}
