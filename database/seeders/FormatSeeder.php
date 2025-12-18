<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Format;

class FormatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_format' => 'Video'],
            ['nama_format' => 'Foto'],
            ['nama_format' => 'Short Video'],
            ['nama_format' => 'Reels'],
        ];

        Format::insert($data);
    }
}
