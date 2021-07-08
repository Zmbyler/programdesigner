<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('program_detail_id')->unsigned()->index(); 
            $table->foreign('program_detail_id')->references('id')->on('user_program_details')->onDelete('cascade');
            $table->bigInteger('assessment_result_id')->unsigned()->index(); 
            $table->foreign('assessment_result_id')->references('id')->on('assessment_results')->onDelete('cascade');
            $table->string('slug');
            $table->string('option');
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
        Schema::dropIfExists('program_assessments');
    }
}
