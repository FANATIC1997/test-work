<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateСharacteristicsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristics_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("house_id")->nullable(false)->unsigned();
            $table->bigInteger("characteristics_id")->nullable(false)->unsigned();
            $table->string("value")->nullable(false);
            $table->timestamps();

            $table->foreign('house_id')->references('id')->on('houses');
            $table->foreign('characteristics_id')->references('id')->on('characteristics');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('characteristics_values', function (Blueprint $table) {
            $table->dropForeign(['house_id', 'characteristics_id']);
        });
        Schema::dropIfExists('characteristics_values');
    }
}
