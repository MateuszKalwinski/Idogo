<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableFursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_furs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('breed_id')->unsigned();
            $table->foreign('breed_id')->references('id')->on('animal_breeds')->onDelete('cascade');
            $table->bigInteger('fur_id')->unsigned();
            $table->foreign('fur_id')->references('id')->on('fur')->onDelete('cascade');
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
        Schema::dropIfExists('available_furs');
    }
}
