<?php

namespace Musicshop\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = DB::table('albums')
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->select('artists.*', 'albums.*')
            ->get();

        return view('home.index', compact('albums'));
    }
}
