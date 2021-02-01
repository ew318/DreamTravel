<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('location');
            $table->float('lat');
            $table->float('long');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('price');
            $table->integer('max_participants');
            $table->string('img')->nullable();
            $table->timestamps();
        });

        DB::table('holidays')->insert(
        array(
            'title' => 'Sail on the Norfolk Broads',
            'description' => 'Join us for a mini break on the broads. All experience levels welcome. Sail every day.',
            'location' => 'East Anglia',
            'lat' => 52.630742,
            'long' => 1.642913,
            'start_date' => '2019-03-01',
            'end_date' => '2019-03-05',
            'price' => 300,
            'max_participants' => 10,
            'img' => 'Sail.jpg'
            )
        );

        DB::table('holidays')->insert(
        array(
            'title' => 'Cycle across the North York Moors',
            'description' => 'A week long cycle tour journeying round the North York Moors',
            'location' => 'North Yorkshire',
            'lat' => 54.331777,
            'long' => -0.690194,
            'start_date' => '2019-07-01',
            'end_date' => '2019-07-08',
            'price' => 400,
            'max_participants' => 15,
            'img' => 'Cycle.jpg'
            )
        );

        DB::table('holidays')->insert(
        array(
            'title' => 'Surf off the Cornish Coast',
            'description' => 'Daily surf lessons available. Board and kit hire included. Full board at the local Wonderful Hotel.',
            'location' => 'Cornwall',
            'lat' => 50.209136,
            'long' => -5.478127,
            'start_date' => '2019-06-11',
            'end_date' => '2019-06-16',
            'price' => 320,
            'max_participants' => 8,
            'img' => 'Surf.jpg'
            )
        );

        DB::table('holidays')->insert(
        array(
            'title' => 'Hike in the Lake District',
            'description' => 'Daily walks led by a local guide. Cost includes luxury campsite.',
            'location' => 'Windermere',
            'lat' => 54.380810,
            'long' => -2.907530,
            'start_date' => '2019-06-19',
            'end_date' => '2019-06-26',
            'price' => 160,
            'max_participants' => 12,
            'img' => 'Lakes.jpeg'
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
        //Schema::dropIfExists('holidays');
    }
}
