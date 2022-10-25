<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Techie Trendz',
                'email' => 'admin@techtrendzph.com',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'current_team_id' => '1',
                'role_id' => '0',
                'type' => 'CEO',
                'phone' => '123456789'
            ],
            [
                'name' => 'Logistics Manager',
                'email' => 'logistics@techtrendzph.com',
                'username' => 'logistics',
                'password' => Hash::make('admin'),
                'current_team_id' => '2',
                'role_id' => '1',
                'type' => 'Employee',
                'phone' => '123456789'
            ],
            [
                'name' => 'Finance Manager',
                'email' => 'finance@techtrendzph.com',
                'username' => 'finance',
                'password' => Hash::make('admin'),
                'current_team_id' => '3',
                'role_id' => '1',
                'type' => 'Employee',
                'phone' => '123456789'
            ],
            [
                'name' => 'Core Manager',
                'email' => 'core@techtrendzph.com',
                'username' => 'core',
                'password' => Hash::make('admin'),
                'current_team_id' => '4',
                'role_id' => '1',
                'type' => 'Employee',
                'phone' => '123456789'
            ],
            [
                'name' => 'HR Manager',
                'email' => 'hr@techtrendzph.com',
                'username' => 'hr',
                'password' => Hash::make('admin'),
                'current_team_id' => '5',
                'role_id' => '1',
                'type' => 'Employee',
                'phone' => '123456789'
            ]
        ]);
    }
}
