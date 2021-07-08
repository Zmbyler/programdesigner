<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentCatOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_cat_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('assessment_result_id')->unsigned()->index(); 
            $table->foreign('assessment_result_id')->references('id')->on('assessment_results')->onDelete('cascade');
            $table->bigInteger('assessment_category_id')->unsigned()->index(); 
            $table->foreign('assessment_category_id')->references('id')->on('assessment_categories')->onDelete('cascade');
            $table->string('option_value');
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
        Schema::dropIfExists('assessment_cat_options');
    }
}
