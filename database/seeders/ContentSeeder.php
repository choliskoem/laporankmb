<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanggal' => '2025-01-10',
                'judul' => 'Kebijakan Baru Pemerintah Daerah',
                'program_id' => 1,
                'klasifikasi_id' => 3,
                'medsos_id' => 1,
                'format_id' => 1,
                'link' => 'https://instagram.com/example'
            ],
            [
                'tanggal' => '2025-01-12',
                'judul' => 'Perayaan Budaya Lokal',
                'program_id' => 2,
                'klasifikasi_id' => 2,
                'medsos_id' => 3,
                'format_id' => 3,
                'link' => 'https://youtube.com/example'
            ],
        ];

        Content::insert($data);
    }
}
