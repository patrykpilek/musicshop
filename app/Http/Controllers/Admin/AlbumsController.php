<?php

namespace Musicshop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Musicshop\Album;
use Musicshop\Artist;
use Illuminate\Http\Response;
use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;
use Musicshop\Http\Requests\AlbumDescriptionUpdateAdminRequest;
use Musicshop\Http\Requests\AlbumImageRequest;
use Musicshop\Http\Requests\AlbumUpdateAdminRequest;

class AlbumsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return mixed
     */
    public function index(){

        $albums = DB::table('artists')
            ->join('albums', 'artists.id', '=', 'albums.artist_id')
            ->select('artists.artist_name', 'albums.*')
            ->get();
        return view('admin.albums.index', compact('albums'));
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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

        return view('admin.albums.show', compact('album', 'artist', 'tracks'));
    }

    public function edit($id)
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
        
        return view('admin.albums.edit', compact('album', 'artist', 'tracks'));
    }

    /**
     * @param AlbumUpdateAdminRequest $request
     * @param $id
     * @return mixed
     */
    public function update(AlbumUpdateAdminRequest $request, $id)
    {
        $album = Album::findOrFail($id);

        $artist = Artist::findOrFail($album->artist_id);

        $artist->update([
            'artist_name' => $request->get('artist'),
        ]);

        $album->update([
            'album_name' => $request->get('album'),
            'price' => $request->get('price'),
            'format' => $request->get('format'),
            'category' => $request->get('category'),
        ]);

        return redirect("/admin/albums/{$album->id}/edit")->withSuccess("Your changes has been saved.");
    }
    
    public function updateDescription(AlbumDescriptionUpdateAdminRequest $request, $id)
    {
        $album = Album::findOrFail($id);

        $album->update([
            'description' => $request->get('description'),
        ]);
        
        return redirect("/admin/albums/{$album->id}/edit")->withSuccess("Your changes has been saved.");
    }

    public function destroy()
    {
        //
    }

    /**
     * @param AlbumImageRequest $request
     * @param $id
     * @return mixed
     */
    public function uploadAlbumImage(AlbumImageRequest $request, $id)
    {
        $album = Album::findOrFail($id);
        if($request->hasFile('album_image_name')){
            $file = $request->file('album_image_name');
            $fileName = $album->id . '-album-image.jpg';
            if($file){
                Storage::disk('album')->put($fileName, File::get($file));
            }
            $album->update([
                'image' => $album->id . '-album-image.jpg',
            ]);

            return redirect("/admin/albums/{$album->id}/edit/")->withSuccess("Your Changes has been saved.");
        }
        return redirect("/admin/albums/{$album->id}/edit/")->withErrors('There were some problems');

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
