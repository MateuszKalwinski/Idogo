<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
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
        Schema::dropIfExists('animal_sizes');
    }
}
