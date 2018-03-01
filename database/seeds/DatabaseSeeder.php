<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AthletesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(InstructorsTableSeeder::class);
        $this->call(MembershipTypesTableSeeder::class);
        $this->call(MembershipsTableSeeder::class);
        $this->call(BodyMeasurementsTableSeeder::class);
        $this->call(WorkoutTypesTableSeeder::class);
        $this->call(WorkoutsTableSeeder::class);
        $this->call(ExercisesTableSeeder::class);
        $this->call(ExerciseStepsTableSeeder::class);
        $this->call(ExerciseTechniquesTableSeeder::class);
        $this->call(WorkoutExercisesTableSeeder::class);
        $this->call(ExerciseProgressesTableSeeder::class);
    }
}
