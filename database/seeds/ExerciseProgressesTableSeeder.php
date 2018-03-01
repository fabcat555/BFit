<?php

use Illuminate\Database\Seeder;
use App\ExerciseProgress;

class ExerciseProgressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        ExerciseProgress::create([
            'workout_exercise_id' => 1,
            'weight' => 30,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 1,
            'weight' => 40,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 1,
            'weight' => 50,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 2,
            'weight' => 30,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 2,
            'weight' => 40,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 2,
            'weight' => 50,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 3,
            'weight' => 30,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 3,
            'weight' => 40,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 3,
            'weight' => 50,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 4,
            'weight' => 30,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 4,
            'weight' => 40,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 4,
            'weight' => 50,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 5,
            'weight' => 30,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 5,
            'weight' => 40,
            'notes' => ''
        ]);
        ExerciseProgress::create([
            'workout_exercise_id' => 5,
            'weight' => 50,
            'notes' => ''
        ]);
    }
}
