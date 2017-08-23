<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Database\Definitions\AlbumsTable;

class CreateAlbumsTable extends Migration
{
    public function up()
    {
        Schema::create("albums", function (Blueprint $table) {
            $table->increments("id");
            $table->timestamps();
            $table->string("name", AlbumsTable::NAME_LENGTH)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists("albums");
    }
}
