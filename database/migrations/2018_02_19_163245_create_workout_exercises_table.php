<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_exercises', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exercise_id');
            $table->integer('workout_id');
            $table->integer('sets');
            $table->integer('reps');
            $table->integer('rest');
            $table->integer('exercise_technique_id');
            $table->text('notes');
            $table->timestamps();

            $table->foreign('exercise_id')
                ->references('exercises')
                ->on('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('workout_id')
                ->references('workouts')
                ->on('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('exercise_technique_id')
                ->references('exercise_techniques')
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
        Schema::dropIfExists('workout_exercises');
    }
}
