<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use View;

use App\Models\Picture;
use Database\Definitions\PicturesTable;

class PictureController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * Validates if url is witin length limit and point to image file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max_length = PicturesTable::URL_LENGTH;
        $rules = array(
            "url" => "required|max:$max_length"
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()) {

            return Redirect::route("albums.show", ["id" => Input::get("album_id")])
            ->withErrors($validator)
            ->withInput();
        } else if(!@file_get_contents(Input::get("url"),0,NULL,0,1)){

            $validator->getMessageBag()->add("url", "Link is not image");
            return Redirect::route("albums.show", ["id" => Input::get("album_id")])
            ->withErrors($validator)
            ->withInput();
        } else {

            $picture = new Picture;
            $picture->url = Input::get("url");
            $picture->album_id = Input::get("album_id");
            $picture->save();

            return Redirect::route("albums.show", ["id" => $picture->album->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picture = Picture::find($id);
        $album_id = $picture->album->id;
        $picture->delete();
        return Redirect::route("albums.show", ["id" => $album_id]);
    }
}
