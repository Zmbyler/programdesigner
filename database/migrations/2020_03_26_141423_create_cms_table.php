<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Cms;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->text('long_description');
            $table->timestamps();
        });
        $data = [
            [
                'title'=>'About Us',
                'slug'=>'about-us',
                'short_description'=>'This is test About us',
                'long_description'=>'This is test About us'
            ],
            [
                'title'=>'Terms And Condition',
                'slug'=>'tearms-condition',
                'short_description'=>'This is test Terms And Condition',
                'long_description'=>'This is test Terms And Condition'
            ],
            [
                'title'=>'Get Started Today!',
                'slug'=>'get-started-today',
                'short_description'=>'Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.',
                'long_description'=>'Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.'
            ]
        ];
        Cms::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms');
    }
}
