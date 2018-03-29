<?php

use Illuminate\Database\Seeder;
use App\Exercise;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exercise::create([
            'name' => 'Squat'
        ]);
        Exercise::create([
            'name' => 'Panca piana'
        ]);
        Exercise::create([
            'name' => 'Stacchi'
        ]);
        Exercise::create([
            'name' => 'Curl manubri'
        ]);
        Exercise::create([
            'name' => 'Tricipiti push down'
        ]);
        Exercise::create([
            'name' => 'Lento avanti'
        ]);
    }
}
