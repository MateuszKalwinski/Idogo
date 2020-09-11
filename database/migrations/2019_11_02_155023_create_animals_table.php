<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('name');
            $table->integer('age');
            $table->text('description');
            $table->integer('price')->nullable();
            $table->string('animalable_type');
            $table->bigInteger('animalable_id');
            $table->bigInteger('species_id');
            $table->bigInteger('color_id')->unsigned()->nullable();
            $table->bigInteger('fur_id')->unsigned()->nullable();
            $table->bigInteger('size_id')->unsigned()->nullable();
            $table->bigInteger('breed_id')->unsigned()->nullable();
            $table->boolean('breed_mix');
            $table->unsignedBigInteger('animal_status_id')->unsigned();
            $table->boolean('recommended')->default(false);
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
        Schema::dropIfExists('animals');
    }
}
