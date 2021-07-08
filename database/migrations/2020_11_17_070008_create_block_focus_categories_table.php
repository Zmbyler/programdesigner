<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockFocusCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_focus_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('block_focus_id');
            $table->foreign('block_focus_id')->references('id')->on('block_foci')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('tempo')->nullable();
            $table->string('rep')->nullable();
            $table->string('kangaroo_vbt')->nullable();
            $table->string('gorilla_vbt')->nullable();
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
        Schema::dropIfExists('block_focus_categories');
    }
}
