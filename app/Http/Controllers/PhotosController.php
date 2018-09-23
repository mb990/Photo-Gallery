<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){

    	return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request){

    	$this->validate($request, [
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]);
    	
        //izvlacenje imena uploadovanog fajla (npr slika.jpg)
        $filenamWithExt = $request->file('photo')->getClientOriginalName();
        //samo ime fajla (npr slika)
        $filename = pathinfo($filenamWithExt, PATHINFO_FILENAME);
        //samo ekstenzija (npr jpg)
        $extension = $request->file('photo')->getClientOriginalExtension();
        //kreiranje novog naziva fajla
        $filenameToStore = $filename . "_" . time() . "." . $extension;
        //UPLOAD IMAGE
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);

    	$photo = New Photo();

    	$photo->album_id = $request->input('album_id'); //ovo dolazi iz hidden polja u formi create photo.
		$photo->title = $request->input('title');
		$photo->description = $request->input('description');
		$photo->size = $request->file('photo')->getClientSize();
		$photo->photo = $filenameToStore;

		$photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo is uploaded.');
    }

    public function show($id){

        $photo = Photo::find($id);

        return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id){

        $photo = Photo::find($id);

        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){ //ovo brise fizicki sliku iz storage foldera.
            $photo->delete(); //ovo brise sliku iz baze
        }

        return redirect('/albums/'.$photo->album_id)->with('success', 'Photo deleted.');
    }
}
