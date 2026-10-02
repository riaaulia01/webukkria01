<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $berita = [
            [
                'judul' => 'Penerimaan Peserta Didik Baru 2026/2027',
                'slug' => 'penerimaan-peserta-didik-baru-2026-2027',
                'isi' => 'Sekolah membuka pendaftaran peserta didik baru untuk tahun ajaran 2026/2027. Pendaftaran dibuka mulai bulan Juni.',
                'tanggal' => now(),
            ],
            [
                'judul' => 'Lomba Sains Tingkat Kota',
                'slug' => 'lomba-sains-tingkat-kota',
                'isi' => 'Siswa-siswi kami berhasil meraih juara 1 dalam lomba sains tingkat kota yang diselenggarakan bulan lalu.',
                'tanggal' => now()->subDays(5),
            ],
            [
                'judul' => 'Kegiatan Class Meeting Semester Genap',
                'slug' => 'kegiatan-class-meeting-semester-genap',
                'isi' => 'Kegiatan class meeting diadakan sebagai bentuk apresiasi setelah ujian akhir semester genap.',
                'tanggal' => now()->subDays(10),
            ],
        ];

        foreach ($berita as $row) {
            Berita::create($row);
        }
    }
}