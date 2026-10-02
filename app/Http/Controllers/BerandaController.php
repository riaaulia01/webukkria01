<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Guru;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();

        $jumlahGuru = Guru::where('jenis', 'Guru')->count();
        $jumlahStaff = Guru::where('jenis', 'Staff')->count();

        $profil = ProfilSekolah::first();
        $jumlahSiswa = $profil->jumlah_siswa ?? 0;

        $berita = [];
        $galeri = [];

        return view('home', compact(
            'beranda',
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahStaff',
            'berita',
            'galeri'
        ));
    }
}