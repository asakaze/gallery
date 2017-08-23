<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Database\Definitions\PicturesTable;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("pictures", function (Blueprint $table) {
            $table->increments("id");
            $table->timestamps();
            $table->unsignedInteger("album_id");
            $table->string("url", PicturesTable::URL_LENGTH);

            $table->foreign("album_id")->references("id")->on("albums")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("pictures");
    }
}
