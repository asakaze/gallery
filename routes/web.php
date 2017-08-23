<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", "AlbumController@index");

Route::resource("albums", "AlbumController", [
    "only" => ["index", "show", "destroy", "create", "store"]
]);

Route::resource("pictures", "PictureController", [
    "only" => ["destroy", "create", "store"]
]);