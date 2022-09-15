<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('teams')->insert([
            [
                 'user_id' => '1',
                 'name' => 'Admin',
                 'personal_team' => '1',
            ],
            [
                 'user_id' => '1',
                 'name' => 'Logistics',
                 'personal_team' => '1',
            ],
            [
                 'user_id' => '1',
                 'name' => 'Finance',
                 'personal_team' => '1',
            ],
            [
                 'user_id' => '1',
                 'name' => 'Core',
                 'personal_team' => '1',
            ],
            [
                 'user_id' => '1',
                 'name' => 'HR',
                 'personal_team' => '1',
            ]
            ]);
    }
}
