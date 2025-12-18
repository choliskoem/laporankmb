<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

          $this->call(MasterSeeder::class);
     DB::table('users')->insert([
            [
                'name' => 'Admin 1',
                'email' => 'admin1@rri.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => null,
                // 'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
  
        ]);
    }
}
