<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedinteger('role_id')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::table('users', function($table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });

        DB::table('users')->insert(
        array(
            'name' => 'administrator',
            'email' => 'admin@dreamtravel.com',
            'password' => bcrypt('administrator'),
            'role_id' => 2
            )
        );

        DB::table('users')->insert(
        array(
            'name' => 'test01',
            'email' => 'test01@test.com',
            'password' => bcrypt('test01'),
            'role_id' => 1
            )
        );
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
