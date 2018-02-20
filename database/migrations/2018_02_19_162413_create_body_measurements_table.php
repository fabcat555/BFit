<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_measurements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('athlete_id');
            $table->double('weight')->nullable();
            $table->double('chest')->nullable();
            $table->double('waist')->nullable();
            $table->double('hips')->nullable();
            $table->double('thighs')->nullable();
            $table->double('calves')->nullable();
            $table->double('biceps')->nullable();
            $table->timestamps();

            $table->foreign('athlete_id')
                ->references('athletes')
                ->on('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('body_measurements');
    }
}
