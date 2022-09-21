<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable(false);
            $table->string("address")->nullable(false);
            $table->string("term")->nullable(false);
            $table->text("description");
            $table->string("map_coordinates");
            $table->string("company");
            $table->string("image_path")->nullable(false);
            $table->string("image_path_preview")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
