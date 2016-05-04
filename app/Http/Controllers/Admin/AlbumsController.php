<?php

namespace Musicshop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Musicshop\Artist;
use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;

class AlbumsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $artists = Artist::all();

        $albums = DB::table('artists')
            ->join('albums', 'artists.id', '=', 'albums.artist_id')
            ->select('artists.artist_name', 'albums.album_name', 'albums.description')
            ->get();
        return view('admin.albums.index', compact('albums'));
    }
}
