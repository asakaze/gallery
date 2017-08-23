<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use View;

use App\Models\Album;
use Database\Definitions\AlbumsTable;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();

        return View::make("album.index")->with("albums", $albums);
    }

    public function create()
    {
        return View::make("album.create");
    }

    public function store(Request $request)
    {
        $max_length = AlbumsTable::NAME_LENGTH;
        $rules = array(
            "name" => "required|unique:albums|max:$max_length|regex:/^[\w-]*$/"
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()) {

            return Redirect::route("albums.create")
            ->withErrors($validator)
            ->withInput();
        } else {
            $album = new Album;
            $album->name = Input::get("name");
            $album->save();

            return Redirect::route("albums.index");
        }
    }

    public function show($id)
    {
        $album = Album::find($id);

        return View::make("album.show")->with("album", $album);
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        return Redirect::route("albums.index");
    }
}
