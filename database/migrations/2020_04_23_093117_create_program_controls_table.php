<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_controls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('block_focus');
            $table->integer('athlete_profile')->nullable();;
            $table->integer('season')->nullable();;
            $table->integer('sport')->nullable();;
            $table->integer('assessment_results');
            $table->string('training_level')->nullable();
            $table->integer('program_template')->nullable();;
            $table->integer('program_goal')->nullable();;
            $table->integer('days')->nullable();;
            $table->string('program_name');
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
        Schema::dropIfExists('program_controls');
    }
}
