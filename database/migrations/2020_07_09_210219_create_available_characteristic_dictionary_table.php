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
            $table->bigInteger('characteristic_dictionary_id')->unsigned();
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
