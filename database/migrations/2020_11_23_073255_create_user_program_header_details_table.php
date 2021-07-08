<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProgramHeaderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_program_header_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('program_control_id');
            $table->foreign('program_control_id')->references('id')->on('program_controls')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('program_goal')->nullable();
            $table->string('coach_notes')->nullable();
            //$table->string('checkIn')->nullable();
            $table->string('comments')->nullable();
            // $table->unsignedBigInteger('program_goal_id');
            // $table->foreign('program_goal_id')->references('id')->on('program_goals')->onDelete('cascade');
            $table->unsignedBigInteger('assessment_category_id')->nullable();
            $table->foreign('assessment_category_id')->references('id')->on('assessment_categories')->onDelete('cascade');
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
        Schema::dropIfExists('user_program_header_details');
    }
}
