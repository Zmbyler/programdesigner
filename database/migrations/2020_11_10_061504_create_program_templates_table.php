<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('user_id')->unsigned();
            $table->string('name',100);
            $table->Integer('template_type_id')->unsigned();
            $table->Integer('program_goal_id')->unsigned()->default(0);
            $table->string('added_by');
            $table->bigInteger('day_id')->unsigned()->index()->nullable(); 
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
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
        Schema::dropIfExists('program_templates');
    }
}
