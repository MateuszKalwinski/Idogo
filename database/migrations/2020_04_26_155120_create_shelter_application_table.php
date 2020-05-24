<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelterApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelter_application', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->string('shelter_name');
            $table->string('street')->nullable();
            $table->string('city');
            $table->string('zip_code');
            $table->string('nip');
            $table->string('regon');
            $table->string('krs')->nullable();
            $table->bigInteger('shelter_application_status_id');
            $table->dateTime('created_at');
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
        Schema::dropIfExists('shelter_application');
    }
}
