<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockfocusTemposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blockfocus_tempos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tempo');
            $table->Integer('block_foci_id')->unsigned();
            $table->Integer('exercise_id')->unsigned();
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
        Schema::dropIfExists('blockfocus_tempos');
    }
}
