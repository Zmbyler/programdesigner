<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\ContactusPage;

class CreateContactusPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactus_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->text('short_description');
            $table->text('long_description');
            $table->timestamps();
        });

        $data = [
            
            [
                'name'=>'Contact Us',
                'address'=>'4248 North River Rd. NE Warren, Ohio',
                'email'=>'info@bylerelitestrength.com',
                'phone'=>'330-989-0022',
                'short_description'=>'Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.',
                'long_description'=>'Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.'
            ]
        ];
        ContactusPage::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactus_pages');
    }
}
