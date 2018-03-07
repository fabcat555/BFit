<?php

use Illuminate\Database\Seeder;
use App\WorkoutExercise;

class WorkoutExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkoutExercise::create([
            'exercise_id' => 1,
            'workout_id' => 1,
            'day' => 1,
            'sets' => 3,
            'reps' => 12,
            'rest' => 90,
            'exercise_technique_id' => 1,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 2,
            'workout_id' => 1,
            'day' => 1,
            'sets' => 4,
            'reps' => 15,
            'rest' => 90,
            'exercise_technique_id' => 2,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 3,
            'workout_id' => 1,
            'day' => 1,
            'sets' => 4,
            'reps' => 10,
            'rest' => 60,
            'exercise_technique_id' => 2,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 4,
            'workout_id' => 1,
            'day' => 1,
            'sets' => 5,
            'reps' => 5,
            'rest' => 90,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 5,
            'workout_id' => 1,
            'day' => 1,
            'sets' => 5,
            'reps' => 25,
            'rest' => 90,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 1,
            'workout_id' => 1,
            'day' => 2,
            'sets' => 3,
            'reps' => 12,
            'rest' => 90,
            'exercise_technique_id' => 1,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 2,
            'workout_id' => 1,
            'day' => 2,
            'sets' => 4,
            'reps' => 15,
            'rest' => 90,
            'exercise_technique_id' => 2,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 3,
            'workout_id' => 1,
            'day' => 2,
            'sets' => 4,
            'reps' => 10,
            'rest' => 60,
            'exercise_technique_id' => 2,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 4,
            'workout_id' => 1,
            'day' => 2,
            'sets' => 5,
            'reps' => 5,
            'rest' => 90,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 5,
            'workout_id' => 1,
            'day' => 2,
            'sets' => 5,
            'reps' => 25,
            'rest' => 90,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 3,
            'workout_id' => 2,
            'day' => 1,
            'sets' => 3,
            'reps' => 15,
            'rest' => 90,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 2,
            'workout_id' => 2,
            'day' => 1,
            'sets' => 4,
            'reps' => 10,
            'rest' => 70,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 1,
            'workout_id' => 2,
            'day' => 1,
            'sets' => 5,
            'reps' => 25,
            'rest' => 120,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 3,
            'workout_id' => 2,
            'day' => 2,
            'sets' => 3,
            'reps' => 15,
            'rest' => 90,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 2,
            'workout_id' => 2,
            'day' => 2,
            'sets' => 4,
            'reps' => 10,
            'rest' => 70,
            'notes' => ''
        ]);
        WorkoutExercise::create([
            'exercise_id' => 1,
            'workout_id' => 2,
            'day' => 2,
            'sets' => 5,
            'reps' => 25,
            'rest' => 120,
            'notes' => ''
        ]);
    }
}
