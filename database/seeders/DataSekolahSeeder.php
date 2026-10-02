namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{ProfilSekolah, Jurusan, Ekstrakurikuler, GuruStaff, Siswa, Berita, Galeri};

class DataSekolahSeeder extends Seeder
{
    public function run(): void
    {
        ProfilSekolah::create([
            'npsn' => '20123456',
            'nama_sekolah' => 'SMK Negeri 1 Cijati',
            'akreditasi' => 'A',
            'tahun_berdiri' => 1985,
            'kepala_sekolah' => 'Drs. Ahmad Suryadi, M.Pd.',
            'alamat' => 'Jl. Pendidikan No. 45, Bandung, Jawa Barat',
            'telepon' => '(022) 123-4567',
            'email' => 'info@smkn1hcijati.sch.id',
            'website' => 'www.smkn1cijati.sch.id',
            'visi' => 'Menjadi sekolah unggul yang menghasilkan lulusan berkarakter, kompeten, dan berdaya saing global.',
            'misi' => 'Menyelenggarakan pendidikan berkualitas, mengembangkan potensi siswa, dan menjalin kerjasama industri.',
        ]);

        $jurusan = [
            ['nama_jurusan' => 'Rekayasa Perangkat Lunak', 'singkatan' => 'RPL', 'deskripsi' => 'Fokus pada pengembangan aplikasi dan sistem informasi.'],
            ['nama_jurusan' => 'Teknik Komputer dan Jaringan', 'singkatan' => 'TKJ', 'deskripsi' => 'Fokus pada jaringan komputer dan infrastruktur IT.'],
            ['nama_jurusan' => 'Multimedia', 'singkatan' => 'MM', 'deskripsi' => 'Fokus pada desain grafis, video, dan animasi.'],
            ['nama_jurusan' => 'Akuntansi', 'singkatan' => 'AK', 'deskripsi' => 'Fokus pada pengelolaan keuangan dan pembukuan.'],
        ];
        foreach ($jurusan as $j) {
            $j['gambar'] = 'https://placehold.co/600x400?text=' . urlencode($j['singkatan']);
            Jurusan::create($j);
        }

        $ekskul = [
            ['nama_ekskul' => 'Pramuka', 'pembina' => 'Budi Santoso, S.Pd.', 'deskripsi' => 'Melatih kedisiplinan dan kepemimpinan.', 'jadwal' => 'Jumat, 14.00 - 16.00'],
            ['nama_ekskul' => 'Basket', 'pembina' => 'Rini Wulandari, S.Pd.', 'deskripsi' => 'Olahraga bola basket tingkat sekolah.', 'jadwal' => 'Selasa & Kamis, 15.00 - 17.00'],
            ['nama_ekskul' => 'Robotika', 'pembina' => 'Andi Prasetyo, S.T.', 'deskripsi' => 'Belajar merancang dan memprogram robot.', 'jadwal' => 'Rabu, 15.00 - 17.00'],
            ['nama_ekskul' => 'Paduan Suara', 'pembina' => 'Siti Aminah, S.Pd.', 'deskripsi' => 'Mengembangkan bakat seni vokal siswa.', 'jadwal' => 'Sabtu, 09.00 - 11.00'],
        ];
        foreach ($ekskul as $e) {
            $e['gambar'] = 'https://placehold.co/600x400?text=' . urlencode($e['nama_ekskul']);
            Ekstrakurikuler::create($e);
        }

        $guru = [
            ['nama' => 'Drs. Ahmad Suryadi, M.Pd.', 'nip' => '196501011990031001', 'jabatan' => 'Kepala Sekolah', 'mapel' => '-', 'kategori' => 'Guru'],
            ['nama' => 'Rini Wulandari, S.Pd.', 'nip' => '198002022005012002', 'jabatan' => 'Guru', 'mapel' => 'Matematika', 'kategori' => 'Guru'],
            ['nama' => 'Andi Prasetyo, S.T.', 'nip' => '198505152010011003', 'jabatan' => 'Guru', 'mapel' => 'Pemrograman', 'kategori' => 'Guru'],
            ['nama' => 'Siti Aminah, S.Pd.', 'nip' => '197803102008012004', 'jabatan' => 'Guru', 'mapel' => 'Bahasa Indonesia', 'kategori' => 'Guru'],
            ['nama' => 'Doni Setiawan', 'nip' => '199001012015011005', 'jabatan' => 'Staff Tata Usaha', 'mapel' => '-', 'kategori' => 'Staff'],
            ['nama' => 'Lestari Putri', 'nip' => '199203152016022006', 'jabatan' => 'Pustakawan', 'mapel' => '-', 'kategori' => 'Staff'],
        ];
        foreach ($guru as $g) {
            $g['foto'] = 'https://placehold.co/300x300?text=Foto';
            GuruStaff::create($g);
        }

        for ($i = 1; $i <= 120; $i++) {
            Siswa::create([
                'nama' => 'Siswa ' . $i,
                'nis' => '2024' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'kelas' => 'X-' . rand(1,3),
                'jurusan' => ['RPL','TKJ','MM','AK'][array_rand(['RPL','TKJ','MM','AK'])],
            ]);
        }

        $berita = [
            ['judul' => 'Penerimaan Peserta Didik Baru 2026/2027', 'isi' => 'Sekolah membuka pendaftaran siswa baru mulai bulan Juni 2026 dengan berbagai jalur seleksi.', 'tanggal' => '2026-06-01'],
            ['judul' => 'Juara 1 Lomba Robotika Tingkat Provinsi', 'isi' => 'Tim robotika sekolah berhasil meraih juara 1 dalam ajang kompetisi robotika tingkat provinsi.', 'tanggal' => '2026-07-15'],
            ['judul' => 'Kegiatan Bakti Sosial Ramadhan', 'isi' => 'Siswa dan guru mengadakan kegiatan bakti sosial pembagian sembako kepada warga sekitar.', 'tanggal' => '2026-03-20'],
        ];
        foreach ($berita as $b) {
            $b['gambar'] = 'https://placehold.co/800x400?text=' . urlencode($b['judul']);
            Berita::create($b);
        }

        $kategori = ['Kegiatan Belajar', 'Ekstrakurikuler', 'Fasilitas', 'Acara Sekolah'];
        for ($i = 1; $i <= 8; $i++) {
            Galeri::create([
                'judul' => 'Dokumentasi Kegiatan ' . $i,
                'gambar' => 'https://placehold.co/500x400?text=Galeri+' . $i,
                'kategori' => $kategori[array_rand($kategori)],
            ]);
        }
    }
}