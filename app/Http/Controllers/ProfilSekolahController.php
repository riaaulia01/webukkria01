<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    // =========================
    // HALAMAN PROFIL WEBSITE
    // =========================

    public function index()
    {
        $profil = ProfilSekolah::first();

        return view('profil', compact('profil'));
    }


    // =========================
    // HALAMAN EDIT PROFIL ADMIN
    // =========================

    public function edit()
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $profil = ProfilSekolah::first();

        return view('admin.profil.edit', compact('profil'));
    }


    // =========================
    // UPDATE PROFIL
    // =========================

    public function update(Request $request)
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'nama_sekolah' => 'required',
            'npsn' => 'required',
            'akreditasi' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'website' => 'nullable',
            'kepala_sekolah' => 'required',
            'tahun_berdiri' => 'required',
            'jumlah_siswa' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'deskripsi' => 'required',

            // Foto Kepala Sekolah
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // Sambutan Kepala Sekolah
            'sambutan_kepala_sekolah' => 'nullable|string',
        ]);

        $profil = ProfilSekolah::first();

        // =========================
        // UPLOAD FOTO KEPALA SEKOLAH
        // =========================

        $fotoKepalaSekolah = $profil->foto_kepala_sekolah;

        if ($request->hasFile('foto_kepala_sekolah')) {

            // Hapus foto lama jika ada
            if ($fotoKepalaSekolah && Storage::disk('public')->exists($fotoKepalaSekolah)) {
                Storage::disk('public')->delete($fotoKepalaSekolah);
            }

            // Simpan foto baru
            $fotoKepalaSekolah = $request->file('foto_kepala_sekolah')
                ->store('profil/ks', 'public');
        }


        // =========================
        // UPDATE DATA PROFIL
        // =========================

        $profil->update([
            'nama_sekolah' => $request->nama_sekolah,
            'npsn' => $request->npsn,
            'akreditasi' => $request->akreditasi,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'website' => $request->website,
            'kepala_sekolah' => $request->kepala_sekolah,
            'foto_kepala_sekolah' => $fotoKepalaSekolah,
            'sambutan_kepala_sekolah' => $request->sambutan_kepala_sekolah,
            'tahun_berdiri' => $request->tahun_berdiri,
            'jumlah_siswa' => $request->jumlah_siswa,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('admin.profil.edit')
            ->with('success', 'Profil Sekolah berhasil diperbarui!');
    }
}