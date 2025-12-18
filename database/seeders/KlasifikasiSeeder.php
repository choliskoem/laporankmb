<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Seeder;
use App\Models\Klasifikasi;

class KlasifikasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_klasifikasi' => 'Informasi'],
            ['nama_klasifikasi' => 'Hiburan'],
            ['nama_klasifikasi' => 'Berita'],
            ['nama_klasifikasi' => 'Edukasi'],
        ];

        Classification::insert($data);
    }
}
