<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class SessionPlaylist //extends Model
{
    use HasFactory;

    public function __construct(){
        
    }
    private $items = Array();
    public function addSongId($song_id){
        // haal op wat er nu in de playlist zit en stop dat in de variabele $current
        //$current = $request->session()->get('playlist');
        $current = session('playlist');

        // als de sessie nog geen 'playlist' had, is $current nu leeg. Maak er dan een lege array van
        if ($current == null) $current = [];

        // voeg de nieuwe song toe aan de variabele $current
        array_push($current, $song_id);

        // schrijf de bijgewerkte $current weg naar de sessie
        Session::put('playlist', $current);
        // dd($current);
    }

    public function removeSong($song_id){
        $current = session('playlist');

        foreach (array_keys($current, $song_id, true) as $song_id) {
            unset($current[$song_id]);
        }

        Session::put('playlist', $current);
    }

    //laat de naam van de songs zien ipv. de nummers van het id
    public function getSongs() {
        $session = session('playlist');

        $songs = [];

        foreach($session as $song_id) {
            $songs[] = Song::find($song_id);
        }

        return $songs;
    }
}
