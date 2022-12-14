<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'name'=>'Samsung Corp.',
                'email'=>'samsung@email.com',
                'location'=>'USA',
                'status'=>'Active'
            ],
            [
                'name'=>'Nokia Corp.',
                'email'=>'nokia@email.com',
                'location'=>'Canada',
                'status'=>'Active'
            ],
            [
                'name'=>'Xiaomi Corp.',
                'email'=>'xaiomi@email.com',
                'location'=>'China',
                'status'=>'Active'
            ],
            [
                'name'=>'Oscorp Group INC.',
                'email'=>'oscorp@email.com',
                'location'=>'Taiwan',
                'status'=>'Active'
            ],
           
        ]);
    }
}
