<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->unsignedinteger('featuretype_id');
            $table->timestamps();
        });
        
        Schema::table('features', function($table) {
            $table->foreign('featuretype_id')->references('id')->on('featuretypes');
        });

        DB::table('features')->insert(
        array(
            'name' => 'Full Board',
            'featuretype_id' => 1
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Half Board',
            'featuretype_id' => 1
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Self Catering',
            'featuretype_id' => 1
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Car Parking',
            'featuretype_id' => 2
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Bus Stop',
            'featuretype_id' => 2
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Washing Machine',
            'featuretype_id' => 3
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Hairdryer',
            'featuretype_id' => 3
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Kettle',
            'featuretype_id' => 3
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Fridge',
            'featuretype_id' => 3
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Microwave',
            'featuretype_id' => 3
            )
        );

        DB::table('features')->insert(
        array(
            'name' => 'Toaster',
            'featuretype_id' => 3
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
        Schema::dropIfExists('features');
    }
}
