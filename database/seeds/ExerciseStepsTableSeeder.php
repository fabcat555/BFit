<?php

use Illuminate\Database\Seeder;
use App\ExerciseStep;

class ExerciseStepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 1
        ]);

        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 4
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 4
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 4
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 4
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 5
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 5
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 5
        ]);
        ExerciseStep::create([
            'description' => $faker->sentence(),
            'exercise_id' => 5
        ]);        
    }
}
