<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'birth_date' => Carbon::createFromDate(1958, 7, 7),
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
    }
}
