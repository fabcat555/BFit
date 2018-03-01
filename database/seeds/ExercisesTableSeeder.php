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
            'name' => 'Bench press'
        ]);
        Exercise::create([
            'name' => 'Stacchi'
        ]);
        Exercise::create([
            'name' => 'Iperestensioni'
        ]);
        Exercise::create([
            'name' => 'Addominali'
        ]);
    }
}
