<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Genre;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::all();

        return view('cruds.songcrud.createsong', [
            'songs' => $songs
        ])->with('artists', Artist::all())->with('genres', Genre::all());
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

        $song = new Song();
        $song->title = $request->title;
        $song->time = $request->time;
        $song->artist_id = $request->artist_id;
        $song->genre_id = $request->genre_id;
        $song->save();

        return redirect('songs');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cruds.songcrud.edit', [
            'song' => Song::find($id),
            'artists' => Artist::all(),
            'genres' => Genre::all()
        ]);
        return redirect('songs');
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
        $song = Song::find($id);
        $song->update([
            $song->title = $request->title,
            $song->time = $request->time,
            $song->artist_id = $request->artist_id,
            $song->genre_id = $request->genre_id,
            $song->save(),
        ]);

        return redirect('songs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();

        return redirect('songs');
    }
}
