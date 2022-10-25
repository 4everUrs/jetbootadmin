<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
        [
            'name'=>'Techie Trendz',
            'address'=>'fake address',
            'phone'=>'123-123-123',
            'email'=> 'techietrendz@email.com',
            'status'=>'Active'
        ],
        [
            'name'=>'Intel Corp',
            'address'=>'fake address',
            'phone'=>'123-123-123',
            'email'=> 'techietrendz@email.com',
            'status'=>'Active'
        ]
    ]);
    }
}
