<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProgramDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_program_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->json('traiining_age')->nullable();
            $table->string('traiining_block');
            $table->string('type');
            $table->string('template')->nullable();
            $table->unsignedInteger('athlete_type')->nullable();
            $table->string('what_based')->nullable();
            $table->unsignedInteger('what_season')->nullable();
            $table->string('program_goal')->nullable();
            $table->json('assessment_option')->nullable();
            $table->string('program_template')->nullable();
            $table->unsignedInterger('assessment_category_id')->nullable();
            $table->unsignedInterger('day_id')->nullable();
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
        Schema::dropIfExists('user_program_details');
    }
}
