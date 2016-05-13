<?php

namespace Musicshop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Musicshop\Album;
use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $albums = DB::table('albums')
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->select('artists.*', 'albums.*')
            ->paginate(config('musicshop.albums_per_page'));

        return view('home.index', compact('albums'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);

        $artist = DB::table('albums')
            ->where('albums.id', '=', $id)
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->select('artists.*')
            ->first();

        $tracks = DB::table('albums')
            ->where('albums.id', '=', $id)
            ->join('tracks', 'albums.id', '=', 'tracks.album_id')
            ->select('tracks.*')
            ->get();

        return view('home.show', compact('album', 'artist', 'tracks'));
    }

    /**
     * @param $filename
     * @return Response
     */
    public function getAlbumImage($filename)
    {
        $file = Storage::disk('album')->get($filename);
        return new Response($file, 200);
    }
}
