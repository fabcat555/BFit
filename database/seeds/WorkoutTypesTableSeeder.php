<?php

use Illuminate\Database\Seeder;
use App\WorkoutType;

class WorkoutTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $wt = WorkoutType::create([
            'name' => 'Strength',
            'description' => $faker->sentence()
        ]);
    }
}
