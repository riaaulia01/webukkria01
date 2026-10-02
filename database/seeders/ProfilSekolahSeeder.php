<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilSekolah;

class ProfilSekolahSeeder extends Seeder
{
    public function run(): void
    {
        ProfilSekolah::create([
            'nama_sekolah' => 'SMK Negeri 1 Cijati',
            'npsn' => '20123456',
            'akreditasi' => 'A',
            'alamat' => 'Jl. Pendidikan No. 10, Bandung',
            'telepon' => '(022) 1234567',
            'email' => 'info@smkn1cijati.sch.id',
            'website' => null,
            'kepala_sekolah' => 'Drs. Ahmad Sutrisno, M.Pd.',
            'tahun_berdiri' => '1985',
            'jumlah_siswa' => 700,
            'visi' => null,
            'misi' => null,
            'deskripsi' => null,
        ]);
    }
}