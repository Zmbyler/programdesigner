<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            //$table->unsignedBigInteger('category_id')->constrained()->onDelete('cascade');
            
            $table->unsignedBigInteger('training_age_id')->nullable(); 
            $table->foreign('training_age_id')->references('id')->on('training_ages');
            $table->unsignedBigInteger('athlete_profile_id')->nullable(); 
            $table->foreign('athlete_profile_id')->references('id')->on('athlete_profiles');
            $table->unsignedBigInteger('block_focus_id')->nullable(); 
            $table->foreign('block_focus_id')->references('id')->on('block_foci');
            $table->unsignedBigInteger('assessment_category_id')->nullable(); 
            $table->foreign('assessment_category_id')->references('id')->on('assessment_categories');
            $table->boolean('status')->default(1);
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
        //Schema::dropIfExists('exercises');

        Schema::table( "exercises", function( $table )
        {
            $table->dropForeign('assessment_result_id_foreign');
            $table->dropColumn('assessment_result_id');
        });
    }
}
