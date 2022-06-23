<?php

namespace App\Http\Controllers;

use App\Models\Selection;
use App\Models\SessionPlaylist;
use App\Models\Song;
use Illuminate\Http\Request;

class SelectionController extends Controller
{
    public function index()
    {
        $selection = new SessionPlaylist;

        $selection = $selection->getSongs();
        // dd($selection);
        return view('selection', [
            'selection' => $selection
        ]);
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(request $selection, $id)
    {        
        $selection = new SessionPlaylist;

        $selection = $selection->removeSong($id);

        // dd($selection, $id);
        // $selection->session()->forget($id);

        return redirect('selection');
    }
}
