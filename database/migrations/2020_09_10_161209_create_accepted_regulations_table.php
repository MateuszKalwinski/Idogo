<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptedRegulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepted_regulations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('acceptedregulationable_type');
            $table->bigInteger('acceptedregulationable_id');
            $table->bigInteger('regulation_id')->unsigned();
            $table->foreign('regulation_id')->references('id')->on('regulations')->onDelete('cascade');
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
        Schema::dropIfExists('accepted_regulations');
    }
}
