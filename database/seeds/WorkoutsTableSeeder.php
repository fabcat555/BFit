<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Workout;

class WorkoutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workout::create([
            'athlete_id' => 1,
            'start_date' => Carbon::now()->subMonth(),
            'end_date' => Carbon::now()->addMonth(),
            'type_id' => 1
        ]);
        Workout::create([
            'athlete_id' => 1,
            'start_date' => Carbon::now()->subYear(),
            'end_date' => Carbon::now()->subMonth(11),
            'type_id' => 1
        ]);
    }
}
