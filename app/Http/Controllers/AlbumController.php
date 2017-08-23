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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();

        return View::make("album.index")->with("albums", $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make("album.create");
    }

    /**
     * Store a newly created resource in storage.
     * Validates if name is alphanumeric, unique and within length limit
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);

        return View::make("album.show")->with("album", $album);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        return Redirect::route("albums.index");
    }
}
