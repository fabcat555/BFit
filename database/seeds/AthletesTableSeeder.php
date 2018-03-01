<?php

use Illuminate\Database\Seeder;
use App\Athlete;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AthletesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Athlete::create([
            'first_name' => 'Fabio',
            'last_name' => 'Catuogno',
            'birth_date' => Carbon::createFromDate(1990, 12, 12),
            'gender' => 'M',
            'height' => 180,
            'notes' => '',
            'email' => 'fabio@fabio.com',
            'password' => Hash::make('moonsault')
        ]);
    }
}
