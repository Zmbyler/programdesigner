<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProgramChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_program_charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('program_id');
            $table->Integer('main_template_id')->unsigned();
            $table->Integer('program_goal_id')->unsigned()->default(0);
            $table->Integer('template_id')->unsigned();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('categories')->onDelete('cascade');
            $table->Integer('exercise_id')->unsigned();
            $table->string('tempo')->nullable();
            $table->string('rest')->nullable();
            $table->string('week1')->nullable();
            $table->string('week2')->nullable();
            $table->string('week3')->nullable();
            $table->string('week4')->nullable();
            $table->string('day')->nullable();
            $table->string('sequence')->nullable();
            $table->string('series')->nullable();
            $table->string('frequency')->nullable();
            $table->string('time')->nullable();
            $table->string('sets_reps')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('user_program_charts');
    }
}
