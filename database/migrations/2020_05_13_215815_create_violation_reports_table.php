<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolationReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violation_reports', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('violationable_type');
            $table->bigInteger('violationable_id');
            $table->string('report_violation_reason', '50')->nullable();
            $table->text('report_violation_text')->nullable();
            $table->integer('user_id')->nullable();
            $table->ipAddress('ip_address')->nullable();
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
        Schema::dropIfExists('violation_reports');
    }
}
