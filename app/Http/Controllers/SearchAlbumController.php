<?php

namespace Musicshop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;

class SearchAlbumController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getAlbumResults(Request $request)
    {
        $query = $request->input('query');

        if(!$query){
            return redirect('/');
        }

        $albums = DB::table('albums')
            ->where('album_name', '=', $query)
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->select('artists.*', 'albums.*')
            ->get();

        return view('home.search', compact('albums'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCDResults()
    {
        $albums = DB::table('albums')
            ->where('format', '=', 'CD')
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->select('artists.*', 'albums.*')
            ->get();

        return view('home.search', compact('albums'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVinylResults()
    {
        $albums = DB::table('albums')
            ->where('format', '=', 'Vinyl')
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->select('artists.*', 'albums.*')
            ->get();

        return view('home.search', compact('albums'));
    }
}
