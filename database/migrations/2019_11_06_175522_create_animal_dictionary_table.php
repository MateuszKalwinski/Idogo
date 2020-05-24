<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_dictionary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->bigInteger('species_id')->unsigned();
            $table->foreign('species_id')->references('id')->on('animal_species')->onDelete('cascade');
            $table->string('name');
            $table->dateTime('created_at');
            $table->integer('created_user_id');
            $table->dateTime('edited_at')->nullable();
            $table->integer('edited_user_id')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('deleted_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_dictionary');
    }
}
