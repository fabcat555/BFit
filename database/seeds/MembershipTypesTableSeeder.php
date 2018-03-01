<?php

use Illuminate\Database\Seeder;
use App\MembershipType;

class MembershipTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mt = MembershipType::create([
            'name' => 'Monthly',
            'validity' => 30,
            'price' => 40
        ]);
    }
}
