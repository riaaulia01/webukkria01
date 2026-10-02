<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $jurusan = [
            [
                'nama_jurusan' => 'Matematika dan Ilmu Pengetahuan Alam',
                'kode' => 'MIPA',
                'deskripsi' => 'Jurusan yang fokus pada bidang sains, matematika, fisika, kimia, dan biologi.'
            ],
            [
                'nama_jurusan' => 'Ilmu Pengetahuan Sosial',
                'kode' => 'IPS',
                'deskripsi' => 'Jurusan yang fokus pada bidang sosial, ekonomi, geografi, dan sejarah.'
            ],
            [
                'nama_jurusan' => 'Bahasa dan Budaya',
                'kode' => 'BAHASA',
                'deskripsi' => 'Jurusan yang fokus pada pengembangan kemampuan bahasa dan sastra.'
            ],
        ];

        foreach ($jurusan as $row) {
            Jurusan::create($row);
        }
    }
}