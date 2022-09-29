<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchase_orders')->insert([
        [
            'supplier_id'=>'1',
            'supplier_name'=>'techie Trendz',
            'po_id'=>'10001'
           
        ],
        [
            'supplier_id'=>'2',
            'supplier_name'=>'Intel Corp',
            'po_id'=>'10002'
        ]
    ]);
    }
}
