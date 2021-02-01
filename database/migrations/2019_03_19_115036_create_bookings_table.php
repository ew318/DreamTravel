<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('user_id');
            $table->unsignedinteger('holiday_id');
            $table->integer('num_places');
            $table->timestamps();
        });

        Schema::table('bookings', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('holiday_id')->references('id')->on('holidays');
        });

        DB::table('bookings')->insert(
        array(
            'user_id' => 2,
            'holiday_id' => 1,
            'num_places' => 2
            )
        );

        DB::table('bookings')->insert(
        array(
            'user_id' => 2,
            'holiday_id' => 2,
            'num_places' => 4
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
        Schema::dropIfExists('bookings');
    }
}
