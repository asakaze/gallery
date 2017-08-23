<?php

use Illuminate\Database\Seeder;

use App\Models\Album;

class AlbumsTableSeeder extends Seeder
{

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Album::truncate();

        $albums = [
            [
                "id" => 1,
                "name" => "Norwegia"
            ],
            [
                "id" => 2,
                "name" => "Japonia"
            ]
        ];

        foreach ($albums as $album) {

            Album::create($album);
        }
    }
}
