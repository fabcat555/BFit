<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('exercise_id');
            $table->timestamps();

            $table->foreign('exercise_id')
                ->references('id')
                ->on('exercises')
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
        Schema::dropIfExists('exercise_steps');
    }
}
