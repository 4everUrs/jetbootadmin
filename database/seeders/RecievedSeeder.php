<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RecievedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('recieveds')->insert([
        [
            'origin'=>'Project Management',
            'type'=>'Contractor',
            'description' => 'fake description',
            'status' => 'Pending'
            
        ],
        [
            'origin'=>'Procurement',
            'type'=>'Supplier',
            'description' => 'fake description',
            'status' => 'Pending'
        ]
    ]);
    }
}
