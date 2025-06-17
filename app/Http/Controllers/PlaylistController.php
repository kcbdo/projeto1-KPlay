<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Http\Requests\StorePlaylistRequest;
use App\Http\Requests\UpdatePlaylistRequest;

class PlaylistController extends Controller
{
    
    public function index()
    {
        return view ('pages.playlists.playlists');
    }
}