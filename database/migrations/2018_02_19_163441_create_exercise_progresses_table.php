<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('workout_exercise_id');
            $table->double('weight');
            $table->text('notes');
            $table->timestamps();

            $table->foreign('workout_exercise_id')
                ->references('id')
                ->on('workout_exercises')
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
        Schema::dropIfExists('exercise_progresses');
    }
}
