<?php

use Illuminate\Database\Seeder;
use App\BodyMeasurement;
use Carbon\Carbon;

class BodyMeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BodyMeasurement::create([
            'athlete_id' => 1,
            'weight' => 70,
            'chest' => 92.4,
            'waist' => 36.5,
            'hips' => 78.2,
            'thighs' => 39.2,
            'calves' => 78.1,
            'biceps' => 23.4,
            'created_at' => Carbon::now()->subMonth(3),
            'updated_at' => Carbon::now()->subMonth(3)
        ]);
        BodyMeasurement::create([
            'athlete_id' => 1,
            'weight' => 71,
            'chest' => 93.4,
            'waist' => 37.5,
            'hips' => 79.2,
            'thighs' => 40.2,
            'calves' => 79.1,
            'biceps' => 24.4,
            'created_at' => Carbon::now()->subMonths(2),
            'updated_at' => Carbon::now()->subMonths(2)
        ]);
        BodyMeasurement::create([
            'athlete_id' => 1,
            'weight' => 72,
            'chest' => 94.4,
            'waist' => 38.5,
            'hips' => 80.2,
            'thighs' => 41.2,
            'calves' => 80.1,
            'biceps' => 25.4,
            'created_at' => Carbon::now()->subMonths(1),
            'updated_at' => Carbon::now()->subMonths(1)
        ]);
        BodyMeasurement::create([
            'athlete_id' => 1,
            'weight' => 68,
            'chest' => 90.4,
            'waist' => 34.5,
            'hips' => 76.2,
            'thighs' => 37.2,
            'calves' => 77.1,
            'biceps' => 20.4,
            'created_at' => Carbon::now()->subDays(15),
            'updated_at' => Carbon::now()->subDays(15)
        ]);
    }
}
