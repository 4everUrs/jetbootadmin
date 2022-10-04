<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('post_requirements')->insert([
        [
            'recieved_id'=>'1',
            'post_id'=>'1',
            'origin' => 'Project Management',
            'requirements'=>'fake Requirements'
            
        ],
        [
            'recieved_id'=>'2',
            'post_id'=>'2',
            'origin' => 'Procurement',
            'requirements'=>'fake Requirements'
        ]
    ]);
    }
}
