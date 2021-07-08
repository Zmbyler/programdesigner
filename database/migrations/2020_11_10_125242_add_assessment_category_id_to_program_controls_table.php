<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssessmentCategoryIdToProgramControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_controls', function (Blueprint $table) {
            $table->unsignedBigInteger('assessment_category_id')->nullable()->after('sport'); 
            $table->foreign('assessment_category_id')->references('id')->on('assessment_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_controls', function (Blueprint $table) {
            //
        });
    }
}
