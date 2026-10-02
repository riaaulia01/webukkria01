<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranJurusan;
use Illuminate\Http\Request;

class PendaftaranJurusanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'asal_sekolah' => 'required',
            'nisn' => 'required',
            'no_whatsapp' => 'required',
            'pilihan_jurusan' => 'required',
        ]);

        PendaftaranJurusan::create([
            'nama_lengkap' => $request->nama_lengkap,
            'asal_sekolah' => $request->asal_sekolah,
            'nisn' => $request->nisn,
            'no_whatsapp' => $request->no_whatsapp,
            'pilihan_jurusan' => $request->pilihan_jurusan,
        ]);

        return back()->with('success', 'Pendaftaran berhasil dikirim!');
    }
}