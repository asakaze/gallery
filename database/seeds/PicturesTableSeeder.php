<?php

use Illuminate\Database\Seeder;

use App\Models\Picture;

class PicturesTableSeeder extends Seeder
{

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Picture::truncate();

        $pictures = [
            [
                "id" => 1,
                "album_id" => 1,
                "url" => "http://i.imgur.com/eiyQWy5.jpg"
            ],
            [
                "id" => 2,
                "album_id" => 1,
                "url" => "https://i.imgur.com/6eHXzWn.jpg"
            ],
            [
                "id" => 3,
                "album_id" => 1,
                "url" => "https://i.imgur.com/AKx3XGq.jpg"
            ],
            [
                "id" => 4,
                "album_id" => 2,
                "url" => "https://i.imgur.com/uErUvKv.jpg"
            ],
            [
                "id" => 5,
                "album_id" => 2,
                "url" => "https://i.imgur.com/4TiP2rs.jpg"
            ]
        ];

        foreach ($pictures as $picture) {

            Picture::create($picture);
        }
    }
}
