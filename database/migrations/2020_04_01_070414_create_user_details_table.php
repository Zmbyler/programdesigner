<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('country_id')->unsigned()->default(0);
            $table->string('city')->nullable();
            $table->string('time_zone')->nullable();
            $table->bigInteger('business_descriptions_id')->unsigned()->nullable();
            $table->string('business_phoneno')->nullable();
            $table->text('business_other_details')->nullable();
            $table->bigInteger('best_descriptions_id')->unsigned()->nullable();
            $table->text('best_other_details')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
