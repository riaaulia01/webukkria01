<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $ekskul = [
            [
                'nama' => 'Pramuka',
                'deskripsi' => 'Kegiatan kepanduan untuk melatih kemandirian dan kedisiplinan.',
                'pembina' => 'Pak Joko'
            ],
            [
                'nama' => 'Basket',
                'deskripsi' => 'Ekstrakurikuler olahraga bola basket.',
                'pembina' => 'Pak Andi'
            ],
            [
                'nama' => 'Paskibra',
                'deskripsi' => 'Pasukan pengibar bendera sekolah.',
                'pembina' => 'Bu Sri'
            ],
            [
                'nama' => 'English Club',
                'deskripsi' => 'Klub pengembangan kemampuan bahasa Inggris.',
                'pembina' => 'Bu Dewi'
            ],
        ];

        foreach ($ekskul as $row) {
            Ekstrakurikuler::create($row);
        }
    }
}