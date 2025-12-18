<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medsos;
use App\Models\SocialMedia;

class MedsosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_medsos' => 'Instagram'],
            ['nama_medsos' => 'Facebook'],
            ['nama_medsos' => 'YouTube'],
            ['nama_medsos' => 'TikTok'],
        ];

        SocialMedia::insert($data);
    }
}
