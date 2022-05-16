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
        $songs = $artist->songs;

        return view('artist', [
            'songs' => $songs,
            'artist' => $artist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all();

        return view('cruds.artistcrud.createartist', [
            'artists' => $artists
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

        $artist = new Artist();
        $artist->name = $request->name;
        $artist->save();

        return redirect('artists');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cruds.artistcrud.edit', [
            'artist' => Artist::find($id),
        ]);
        return redirect('artists');
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
        $artist = Artist::find($id);
        $artist->update([
            $artist->name = $request->name,
            $artist->save(),
        ]);

        return redirect('artists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);
        $artist->delete();

        return redirect('artists');
    }
}
