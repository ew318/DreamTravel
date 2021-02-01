<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidayfeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidayfeatures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('holiday_id');
            $table->unsignedinteger('feature_id');
            $table->timestamps();
        });
        
        Schema::table('holidayfeatures', function($table) {
            $table->foreign('feature_id')->references('id')->on('features');
        });
        
        Schema::table('holidayfeatures', function($table) {
            $table->foreign('holiday_id')->references('id')->on('holidays');
        });

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 1,
            'feature_id' => 3
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 1,
            'feature_id' => 9
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 2,
            'feature_id' => 2
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 2,
            'feature_id' => 5
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 2,
            'feature_id' => 6
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 2,
            'feature_id' => 7
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 2,
            'feature_id' => 8
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 2,
            'feature_id' => 9
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 2,
            'feature_id' => 10
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 3,
            'feature_id' => 1
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 3,
            'feature_id' => 4
            )
        );

        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 4,
            'feature_id' => 3
            )
        );
        
        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 4,
            'feature_id' => 4
            )
        );
        
        DB::table('holidayfeatures')->insert(
        array(
            'holiday_id' => 4,
            'feature_id' => 5
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
        Schema::dropIfExists('holidayfeatures');
    }
}
