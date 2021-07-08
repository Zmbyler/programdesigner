<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email',100)->unique();
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('business_name')->nullable();
            $table->string('profile_image')->nullable();
            $table->integer('step')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'first_name'=>'Super',
            'last_name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('123456'),
            'step' => 0
           
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
