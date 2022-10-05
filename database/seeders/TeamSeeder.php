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
               //Admin
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
               ],
               //Logistics
               [
                    'user_id' => '2',
                    'name' => 'Procurement',
                    'personal_team' => '2',
               ],
               [
                    'user_id' => '2',
                    'name' => 'Asset Management',
                    'personal_team' => '2',
               ],
               [
                    'user_id' => '2',
                    'name' => 'Project Management',
                    'personal_team' => '2',
               ],
               [
                    'user_id' => '2',
                    'name' => 'Fleet Management',
                    'personal_team' => '2',
               ],
               [
                    'user_id' => '2',
                    'name' => 'Vendor Portal',
                    'personal_team' => '2',
               ],
               [
                    'user_id' => '2',
                    'name' => 'MRO',
                    'personal_team' => '2',
               ],
               [
                    'user_id' => '2',
                    'name' => 'Vehicle Reservation',
                    'personal_team' => '2',
               ],
               [
                    'user_id' => '2',
                    'name' => 'Audit Management',
                    'personal_team' => '2',
               ],
               [
                    'user_id' => '2',
                    'name' => 'Warehouse',
                    'personal_team' => '2',
               ],
               //Finance
               [
                    'user_id' => '3',
                    'name' => 'AP/AR',
                    'personal_team' => '3',
               ],
               [
                    'user_id' => '3',
                    'name' => 'General Ledger',
                    'personal_team' => '3',
               ],
               [
                    'user_id' => '3',
                    'name' => 'Disbursement',
                    'personal_team' => '3',
               ],
               [
                    'user_id' => '3',
                    'name' => 'Budget Management',
                    'personal_team' => '3',
               ],
               [
                    'user_id' => '3',
                    'name' => 'Collections',
                    'personal_team' => '3',
               ],
               //Core
               [
                    'user_id' => '4',
                    'name' => 'Position Job Mgmt.',
                    'personal_team' => '4',
               ],
               [
                    'user_id' => '4',
                    'name' => 'Recruitment',
                    'personal_team' => '4',
               ],
               [
                    'user_id' => '4',
                    'name' => 'Client Mgmt',
                    'personal_team' => '4',
               ],

          ]);
     }
}
