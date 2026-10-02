<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\PendaftaranJurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    // =========================
    // HALAMAN JURUSAN PUBLIK
    // =========================

    public function index()
    {
        $jurusan = Jurusan::all();

        return view('jurusan', compact('jurusan'));
    }


    // =========================
    // DETAIL JURUSAN
    // =========================

    public function show($id)
    {
        $jurusan = Jurusan::with('kegiatan')->findOrFail($id);

        return view('jurusan-detail', compact('jurusan'));
    }


    // =========================
    // FORM PENDAFTARAN JURUSAN
    // =========================

    public function daftar($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        return view('pendaftaran-jurusan', compact('jurusan'));
    }


    // =========================
    // SIMPAN PENDAFTARAN
    // =========================

    public function simpanPendaftaran(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'nis' => 'required',
            'whatsapp' => 'required',
        ]);

        $jurusan = Jurusan::findOrFail($id);

        PendaftaranJurusan::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nis' => $request->nis,
            'whatsapp' => $request->whatsapp,
            'jurusan_id' => $jurusan->id,
        ]);

        return redirect()
            ->route('jurusan.show', $jurusan->id)
            ->with('success', 'Pendaftaran jurusan berhasil dikirim.');
    }


    // =========================
    // ADMIN - DAFTAR JURUSAN
    // =========================

    public function adminIndex()
    {
        $jurusans = Jurusan::all();

        return view(
            'admin.jurusan.index',
            compact('jurusans')
        );
    }


    // =========================
    // ADMIN - FORM TAMBAH
    // =========================

    public function create()
    {
        return view('admin.jurusan.create');
    }


    // =========================
    // ADMIN - SIMPAN JURUSAN
    // =========================

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required',
            'kode' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaGambar = null;

        if ($request->hasFile('gambar')) {

            $namaGambar = $request->file('gambar')
                ->store('jurusan', 'public');
        }

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namaGambar,
        ]);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Data jurusan berhasil ditambahkan.');
    }


    // =========================
    // ADMIN - FORM EDIT
    // =========================

    public function edit(Jurusan $jurusan)
    {
        return view(
            'admin.jurusan.edit',
            compact('jurusan')
        );
    }


    // =========================
    // ADMIN - UPDATE JURUSAN
    // =========================

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama_jurusan' => 'required',
            'kode' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaGambar = $jurusan->gambar;

        if ($request->hasFile('gambar')) {

            $namaGambar = $request->file('gambar')
                ->store('jurusan', 'public');
        }

        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namaGambar,
        ]);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Data jurusan berhasil diperbarui.');
    }


    // =========================
    // ADMIN - HAPUS JURUSAN
    // =========================

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Data jurusan berhasil dihapus.');
    }
}