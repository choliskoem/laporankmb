<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama' => 'Budi Santoso', 'jabatan' => 'Editor Konten'],
            ['nama' => 'Rina Marlina', 'jabatan' => 'Editor Cover'],
            ['nama' => 'Agus Wijaya', 'jabatan' => 'Narator'],
            ['nama' => 'Sari Putri', 'jabatan' => 'Presenter'],
            ['nama' => 'Dian Lestari', 'jabatan' => 'Penulis Naskah'],
            ['nama' => 'Fajar Yudi', 'jabatan' => 'Narasumber'],
            ['nama' => 'Andi Saputra', 'jabatan' => 'Kameramen'],
            ['nama' => 'Rizky Pratama', 'jabatan' => 'Switcher'],
        ];

        Person::insert($data);
    }
}
