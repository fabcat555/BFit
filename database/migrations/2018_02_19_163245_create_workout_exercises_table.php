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
            $table->integer('day');
            $table->integer('sets');
            $table->integer('reps');
            $table->integer('rest');
            $table->integer('exercise_technique_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('exercise_id')
                ->references('id')
                ->on('exercises')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('workout_id')
                ->references('id')
                ->on('workouts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('exercise_technique_id')
                ->references('id')
                ->on('exercise_techniques')
                ->onUpdate('cascade')
                ->onDelete('set null');


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
