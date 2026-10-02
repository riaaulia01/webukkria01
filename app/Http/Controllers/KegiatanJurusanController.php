<?php

namespace App\Http\Controllers;

use App\Models\KegiatanJurusan;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KegiatanJurusanController extends Controller
{
    // =========================
    // ADMIN - DAFTAR KEGIATAN
    // =========================

    public function index()
    {
        $kegiatan = KegiatanJurusan::with('jurusan')
            ->latest()
            ->get();

        return view(
            'admin.kegiatan-jurusan.index',
            compact('kegiatan')
        );
    }

    // =========================
    // ADMIN - FORM TAMBAH
    // =========================

    public function create()
    {
        $jurusans = Jurusan::all();

        return view(
            'admin.kegiatan-jurusan.create',
            compact('jurusans')
        );
    }

    // =========================
    // ADMIN - SIMPAN
    // =========================

    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaGambar = null;

        if ($request->hasFile('gambar')) {
            $namaGambar = $request->file('gambar')
                ->store('kegiatan-jurusan', 'public');
        }

        KegiatanJurusan::create([
            'jurusan_id' => $request->jurusan_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namaGambar,
        ]);

        return redirect()
            ->route('admin.kegiatan-jurusan.index')
            ->with('success', 'Foto kegiatan jurusan berhasil ditambahkan.');
    }

    // =========================
    // ADMIN - FORM EDIT
    // =========================

    public function edit(KegiatanJurusan $kegiatanJurusan)
    {
        $jurusans = Jurusan::all();

        return view(
            'admin.kegiatan-jurusan.edit',
            compact('kegiatanJurusan', 'jurusans')
        );
    }

    // =========================
    // ADMIN - UPDATE
    // =========================

    public function update(
        Request $request,
        KegiatanJurusan $kegiatanJurusan
    ) {
        $request->validate([
            'jurusan_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaGambar = $kegiatanJurusan->gambar;

        if ($request->hasFile('gambar')) {
            $namaGambar = $request->file('gambar')
                ->store('kegiatan-jurusan', 'public');
        }

        $kegiatanJurusan->update([
            'jurusan_id' => $request->jurusan_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namaGambar,
        ]);

        return redirect()
            ->route('admin.kegiatan-jurusan.index')
            ->with('success', 'Foto kegiatan jurusan berhasil diperbarui.');
    }

    // =========================
    // ADMIN - HAPUS
    // =========================

    public function destroy(KegiatanJurusan $kegiatanJurusan)
    {
        $kegiatanJurusan->delete();

        return redirect()
            ->route('admin.kegiatan-jurusan.index')
            ->with('success', 'Foto kegiatan jurusan berhasil dihapus.');
    }
}