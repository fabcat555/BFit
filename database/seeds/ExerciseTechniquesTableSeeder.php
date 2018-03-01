<?php

use Illuminate\Database\Seeder;
use App\ExerciseTechnique;

class ExerciseTechniquesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        ExerciseTechnique::create([
            'name' => 'Stripping',
            'description' => $faker->paragraph(10)
        ]);
        ExerciseTechnique::create([
            'name' => 'Superset',
            'description' => $faker->paragraph(10)
        ]);
        ExerciseTechnique::create([
            'name' => 'Serie 21',
            'description' => $faker->paragraph(10)
        ]);
    }
}
