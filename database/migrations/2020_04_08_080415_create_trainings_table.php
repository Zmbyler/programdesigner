<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Training;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('image');
            $table->text('short_description')->nullable();
            $table->text('long_description');
            $table->timestamps();
        });

        $data = [
            [
                'title'=>'BEAST UNIVERSITY //Youth Training',
                'short_description'=>'Looking to get recruited at your favorite college, or just trying to excel in your middle school sport? For athletes ages 6 to 18, BEAST University could be the best solution for you. Classes are separated by age bracket and programs and individualized to your needs.',
                'long_description'=>'Looking to get recruited at your favorite college, or just trying to excel in your middle school sport? For athletes ages 6 to 18, BEAST University could be the best solution for you. Classes are separated by age bracket and programs and individualized to your needs.',
                'image'=>''
            ],
            [
                'title'=>'BEST FIT CAMP //Adult Training',
                'short_description'=>'For adults of all ages, Coach Byler starts all program-designs off with a thorough assessment of your movement patterns, nutrition habits and more. This interval training, where we pay very close attention to detail and form, could be for you!',
                'long_description'=>'For adults of all ages, Coach Byler starts all program-designs off with a thorough assessment of your movement patterns, nutrition habits and more. This interval training, where we pay very close attention to detail and form, could be for you!',
                'image'=>''
            ]
        ];
        Training::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
