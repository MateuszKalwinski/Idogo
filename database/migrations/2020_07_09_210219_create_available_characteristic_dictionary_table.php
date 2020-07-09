<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableCharacteristicDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_characteristic_dictionary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('species_id')->unsigned();
            $table->foreign('species_id')->references('id')->on('animal_species')->onDelete('cascade');
            $table->bigInteger('characteristic_dictionary_id')->unsigned();
            $table->foreign('characteristic_dictionary_id')->references('id')->on('characteristic_dictionary_id')->onDelete('cascade');
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
        Schema::dropIfExists('available_characteristic_dictionary');
    }
}
