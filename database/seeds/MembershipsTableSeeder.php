<?php

use Illuminate\Database\Seeder;
use App\Membership;
use Carbon\Carbon;

class MembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membership = Membership::create([
            'athlete_id' => 1,
            'start_date' => Carbon::now()->subMonth(),
            'end_date' => Carbon::now()->addMonth(),
            'status' => true,
            'type_id' => 1
        ]);
    }
}
