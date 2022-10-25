<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workshops')->insert([
            [
                'name' => 'Speed Up Garage',
                'address' => 'Bulacan',
                'phone' => '123-123-123',
                'email' => 'speedup@email.com',
                'status' => 'Pending'
            ],
            [
                'name' => 'Greasemonkey Autoworks',
                'address' => 'Novalichez, Caloocan',
                'phone' => '123-123-123',
                'email' => 'ungoy@email.com',
                'status' => 'Pending'
            ]
        ]);
    }
}
