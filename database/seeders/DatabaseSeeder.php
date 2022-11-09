<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
                // \App\Models\User::factory(10)->create();

                // \App\Models\User::factory()->create([
                //     'name' => 'Test User',
                //     'email' => 'test@example.com',
                // ]);
                $this->call(TeamSeeder::class);
                $this->call(AdminSeeder::class);
                // $this->call(SupplierSeeder::class);
                // $this->call(PoItemSeeder::class);
                // $this->call(PoSeeder::class);
                // $this->call(RequirementSeeder::class);
                // $this->call(RecievedSeeder::class);
        }
}
