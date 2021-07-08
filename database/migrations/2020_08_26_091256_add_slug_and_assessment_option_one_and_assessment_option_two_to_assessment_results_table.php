<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugAndAssessmentOptionOneAndAssessmentOptionTwoToAssessmentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assessment_results', function (Blueprint $table) {
            $table->string('slug')->after('status');
            $table->string('assessment_option_one')->nullable()->after('slug');
            $table->string('assessment_option_two')->nullable()->after('assessment_option_one');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assessment_results', function (Blueprint $table) {
            //
        });
    }
}
