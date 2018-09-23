<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();
    	return view('albums.index')->with('albums', $albums);
    }

    public function create(){
    	return view('albums.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);
    	
        //izvlacenje imena uploadovanog fajla (npr slika.jpg)
        $filenamWithExt = $request->file('cover_image')->getClientOriginalName();
        //samo ime fajla (npr slika)
        $filename = pathinfo($filenamWithExt, PATHINFO_FILENAME);
        //samo ekstenzija (npr jpg)
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        //kreiranje novog naziva fajla
        $filenameToStore = $filename . "_" . time() . "." . $extension;
        //UPLOAD IMAGE
        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

    	$album = New Album();

		$album->name = $request->input('name');
		$album->description = $request->input('description');
		$album->cover_image = $filenameToStore;

		$album->save();

        return redirect('/albums')->with('success', 'Album ' . $album->name . ' is created.');
    }

    public function showAlbums(){
        $albums = Album::with('Photos')->get();
        return view('albums.albums')->with('albums', $albums);
    }

    public function show($id){
        $album = Album::with('Photos')->find($id);

        return view('albums.show')->with('album', $album);
    }
}
