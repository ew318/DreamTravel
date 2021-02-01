<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featuretypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        DB::table('featuretypes')->insert(
        array(
            'name' => 'Board Basis'
            )
        );

        DB::table('featuretypes')->insert(
        array(
            'name' => 'Transport'
            )
        );

        DB::table('featuretypes')->insert(
        array(
            'name' => 'Facilities'
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
        Schema::dropIfExists('featuretypes');
    }
}
