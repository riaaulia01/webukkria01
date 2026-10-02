<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\PendaftaranEkstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    // =========================
    // HALAMAN PUBLIK
    // =========================
    public function index()
    {
        $ekskul = Ekstrakurikuler::all();

        return view('ekstrakurikuler', compact('ekskul'));
    }


    // =========================
    // HALAMAN DETAIL EKSKUL
    // =========================
    public function show($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        return view(
            'ekstrakurikuler-detail',
            compact('ekstrakurikuler')
        );
    }


    // =========================
    // FORM PENDAFTARAN EKSKUL
    // =========================
    public function daftar($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        return view(
            'pendaftaran-ekstrakurikuler',
            compact('ekstrakurikuler')
        );
    }


    // =========================
    // SIMPAN PENDAFTARAN EKSKUL
    // =========================
    public function simpanPendaftaran(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'nis' => 'required',
            'whatsapp' => 'required',
        ]);

        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        PendaftaranEkstrakurikuler::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nis' => $request->nis,
            'whatsapp' => $request->whatsapp,
            'ekstrakurikuler_id' => $ekstrakurikuler->id,
        ]);

        return redirect()
            ->route('ekstrakurikuler.show', $ekstrakurikuler->id)
            ->with('success', 'Pendaftaran ekstrakurikuler berhasil dikirim.');
    }


    // =========================
    // HALAMAN ADMIN
    // =========================
    public function adminIndex()
    {
        $ekstrakurikulers = Ekstrakurikuler::all();

        return view(
            'admin.ekstrakurikuler.index',
            compact('ekstrakurikulers')
        );
    }


    // =========================
    // FORM TAMBAH
    // =========================
    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }


    // =========================
    // SIMPAN DATA
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pembina' => 'nullable',
            'jadwal' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create([
            'nama' => $request->nama,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }


    // =========================
    // FORM EDIT
    // =========================
    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view(
            'admin.ekstrakurikuler.edit',
            compact('ekstrakurikuler')
        );
    }


    // =========================
    // UPDATE DATA
    // =========================
    public function update(
        Request $request,
        Ekstrakurikuler $ekstrakurikuler
    ) {
        $request->validate([
            'nama' => 'required',
            'pembina' => 'nullable',
            'jadwal' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = $ekstrakurikuler->gambar;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->update([
            'nama' => $request->nama,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }


    // =========================
    // HAPUS DATA
    // =========================
    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}