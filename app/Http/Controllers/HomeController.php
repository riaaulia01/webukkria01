<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\GuruStaff;
use App\Models\Siswa;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->take(3)->get();
        $galeris = Galeri::latest()->take(6)->get();
        $jumlahGuru = GuruStaff::where('jabatan', 'like', '%guru%')->count();
        $jumlahSiswa = Siswa::count();

        return view('home', compact('beritas', 'galeris', 'jumlahGuru', 'jumlahSiswa'));
    }
}