<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $guru = [
            [
                'nama' => 'Drs. Ahmad Sutrisno, M.Pd.',
                'jabatan' => 'Kepala Sekolah',
                'mapel' => '-',
                'jenis' => 'Staff',
            ],
            [
                'nama' => 'Siti Nurhaliza, S.Pd.',
                'jabatan' => 'Guru',
                'mapel' => 'Matematika',
                'jenis' => 'Guru',
            ],
            [
                'nama' => 'Budi Santoso, S.Pd.',
                'jabatan' => 'Guru',
                'mapel' => 'Bahasa Indonesia',
                'jenis' => 'Guru',
            ],
            [
                'nama' => 'Dewi Lestari, S.Pd.',
                'jabatan' => 'Guru',
                'mapel' => 'Bahasa Inggris',
                'jenis' => 'Guru',
            ],
            [
                'nama' => 'Eka Putra, S.Kom.',
                'jabatan' => 'Guru',
                'mapel' => 'Informatika',
                'jenis' => 'Guru',
            ],
            [
                'nama' => 'Rina Marlina, A.Md.',
                'jabatan' => 'Staff Tata Usaha',
                'mapel' => '-',
                'jenis' => 'Staff',
            ],
        ];

        foreach ($guru as $row) {
            Guru::create($row);
        }
    }
}