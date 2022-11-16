<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_requests')->insert([
            [
                'origin' => 'Asset Management',
                'status' => 'Pending',
                'requestor' => 'Techie Trendz',
                'project_name' => 'Car Purchasing',
                'content' => 'We want to acquire new vehicle. Mitsubishi L300'

            ],
            [
                'origin' => 'Warehouse',
                'status' => 'Pending',
                'requestor' => 'Khristian Hosena',
                'project_name' => 'Building Elavator',
                'content' => 'We want to request an elevator inside out warehouse'
            ],


        ]);
    }
}
