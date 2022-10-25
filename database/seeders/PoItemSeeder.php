<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('po_items')->insert([
        [
            'qty'=>'50',
            'item'=>'fake item1',
            'cost'=>'1000',
            'totalcost'=> '50000',
            'purchase_order_id'=>'1',
            'po_id'=>'10001'
        ],
        [
            'qty'=>'30',
            'item'=>'fake item2',
            'cost'=>'2000',
            'totalcost'=> '60000',
            'purchase_order_id'=>'2',
            'po_id'=>'10002'
        ]
    ]);
    }
}
