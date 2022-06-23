<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\SessionPlaylist;
use Illuminate\Support\Facades\Session;


class SessionController extends Controller
{
    public function addSongIdToSession(Request $request, $song_id) {
        $sessionplaylist = new SessionPlaylist();
        $sessionplaylist->addSongId($song_id);
        Session::flash('info', 'item toegevoegd');
        return redirect('songs');
    }

    public function getSessionData(Request $request, $song_id)
    {
        if ($request->session()->has($song_id)) {
            echo $request->session()->get($song_id);
        } else {
            echo "No session data";
        }
    }
}
