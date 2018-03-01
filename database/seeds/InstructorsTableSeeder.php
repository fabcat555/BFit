<?php

use Illuminate\Database\Seeder;
use App\Instructor;
use Carbon\Carbon;

class InstructorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instructor::create([
            'first_name' => 'Max',
            'last_name' => 'Power',
            'birth_date' => Carbon::createFromDate(1978, 8, 8),
            'email' => 'ins@ins.com',
            'password' => Hash::make('password')
        ]);
    }
}
