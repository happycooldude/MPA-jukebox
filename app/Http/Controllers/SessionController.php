<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class SessionController extends Controller
{
    public function getSessionData(Request $request)
    {
        if ($request->session()->has('title')) {
            echo $request->session()->get('title');
        } else {
            echo "No session data";
        }
    }

    public function storeSessionData(Request $request)
    {
        $request->session()->put('title', 'song');
        return redirect('playlists')->with('title', 'song');
    }

    public function deleteSessionData(Request $request)
    {
        $request->session()->forget('title');
        echo "Session data deleted";
    }
}
