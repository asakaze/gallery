<?php

use Faker\Generator;
use Carbon\Carbon;

use App\Models\Album;
use App\Models\Picture;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Album::class, function(Generator $faker) {

    return
    [
        "name" => $faker->unique()->word,
        "created_at" => Carbon::now(),
        "updated_at" => Carbon::now()
    ];
});

$factory->define(Picture::class, function(Generator $faker) {

    return
    [
        "album_id" => Album::all()->random()->id,
        "url" => $faker->url,
        "created_at" => Carbon::now(),
        "updated_at" => Carbon::now()
    ];
});