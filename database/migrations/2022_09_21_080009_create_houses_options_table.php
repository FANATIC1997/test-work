<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('houses_id')->nullable(false)->unsigned();
            $table->bigInteger('option_id')->nullable(false)->unsigned();
            $table->timestamps();

            $table->foreign('houses_id')->references('id')->on('houses');
            $table->foreign('option_id')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses_options', function (Blueprint $table) {
            $table->dropForeign(['houses_id', 'option_id']);
        });
        Schema::dropIfExists('houses_options');
    }
}
