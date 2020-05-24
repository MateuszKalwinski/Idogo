<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalBreedDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_breed_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('breed_id')->unsigned();
            $table->foreign('breed_id')->references('id')->on('animal_breeds')->onDelete('cascade');
            $table->text('nature')->nullable();
            $table->text('skill')->nullable();
            $table->text('raising')->nullable();
            $table->text('perfect_owner')->nullable();
            $table->text('health')->nullable();
            $table->text('diet')->nullable();
            $table->text('care')->nullable();
            $table->text('history')->nullable();
            $table->text('fact')->nullable();
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
        Schema::dropIfExists('animal_breed_descriptions');
    }
}
