<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    public function run()
    {
        $this->call([
           
            // PersonSeeder::class,
            ProgramSeeder::class,
            KlasifikasiSeeder::class,
            MedsosSeeder::class,
            FormatSeeder::class,
            ContentSeeder::class,
        ]);
    }
}
