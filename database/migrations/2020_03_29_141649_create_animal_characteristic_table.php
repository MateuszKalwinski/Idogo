<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalCharacteristicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_characteristic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('animal_id')->unsigned();
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
            $table->bigInteger('characteristic_dictionary_id');
            $table->boolean('character_status');
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
        Schema::dropIfExists('animal_characteristic');
    }
}
