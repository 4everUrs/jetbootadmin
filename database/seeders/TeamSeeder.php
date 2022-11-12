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
                    'user_id' => '1000',
                    'name' => 'Admin',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1000',
                    'name' => 'Logistics',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1000',
                    'name' => 'Finance',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1000',
                    'name' => 'Core',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1000',
                    'name' => 'HR',
                    'personal_team' => '1',
               ],
               //Logistics
               [
                    'user_id' => '1001',
                    'name' => 'Procurement',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1001',
                    'name' => 'Asset Management',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1001',
                    'name' => 'Project Management',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1001',
                    'name' => 'Fleet Management',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1001',
                    'name' => 'Vendor Portal',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1001',
                    'name' => 'MRO',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1001',
                    'name' => 'Vehicle Reservation',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1001',
                    'name' => 'Audit Management',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1001',
                    'name' => 'Warehouse',
                    'personal_team' => '1',
               ],
               //Finance
               [
                    'user_id' => '1002',
                    'name' => 'AP/AR',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1002',
                    'name' => 'General Ledger',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1002',
                    'name' => 'Disbursement',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1002',
                    'name' => 'Budget Management',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1002',
                    'name' => 'Collections',
                    'personal_team' => '1',
               ],
               //Core
               [
                    'user_id' => '1003',
                    'name' => 'Position Job Mgmt.',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1003',
                    'name' => 'Recruitment',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1003',
                    'name' => 'Client Mgmt',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1003',
                    'name' => 'New hire on board',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1003',
                    'name' => 'Employee Mgmt',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1003',
                    'name' => 'Recruiting Analytics & Reporting',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1003',
                    'name' => 'Payroll & Paymeng Mgmt.',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1003',
                    'name' => 'Placement Management',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1003',
                    'name' => 'Clients Agreement & Contract Mgmt.',
                    'personal_team' => '1',
               ],
               // HR
               [
                    'user_id' => '1004',
                    'name' => 'Core Human Capital',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1004',
                    'name' => 'Leave Management',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1004',
                    'name' => 'Timesheet Management',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1004',
                    'name' => 'Time and Attendance',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1004',
                    'name' => 'Shift and Schedule',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1004',
                    'name' => 'Payroll',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1004',
                    'name' => 'HR Analytics',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1004',
                    'name' => 'Compensation Planning',
                    'personal_team' => '1',
               ],
               [
                    'user_id' => '1004',
                    'name' => 'Claims & Reimbursement',
                    'personal_team' => '1',
               ],
               //Vendor Portal
               [
                    'user_id' => '1005',
                    'name' => 'Vendor Client',
                    'personal_team' => '1',
               ],

          ]);
     }
}
