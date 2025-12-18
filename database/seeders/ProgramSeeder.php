<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_program' => 'Dialog Publik'],
            ['nama_program' => 'Lintas Kota'],
            ['nama_program' => 'Kilas Berita'],
            ['nama_program' => 'Zona Aktual'],
        ];

        Program::insert($data);
    }
}
