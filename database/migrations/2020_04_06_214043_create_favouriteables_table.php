<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavouriteablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favouriteables', function (Blueprint $table) {
            $table->string('favouriteable_type'); /* Lecture 8 */
            $table->bigInteger('favouriteable_id'); /* Lecture 8 */
            $table->bigInteger('user_id')->unsigned(); /* Lecture 8 */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); /* Lecture 8 */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favouriteables');
    }
}
