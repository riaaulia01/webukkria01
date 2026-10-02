<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Halaman Galeri Publik
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('galeri', compact('galeris'));
    }

    // Halaman Admin Galeri
    public function adminIndex()
    {
        $galeris = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    // Form Tambah
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori' => 'nullable',
        ]);

        // Upload foto ke storage
        $gambar = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'gambar' => $gambar,
            'kategori' => $request->kategori,
        ]);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }

    // Form Edit
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    // Update Data
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori' => 'nullable',
        ]);

        // Kalau ada foto baru
        if ($request->hasFile('gambar')) {

            // Hapus foto lama
            if ($galeri->gambar &&
                Storage::disk('public')->exists($galeri->gambar)) {

                Storage::disk('public')->delete($galeri->gambar);
            }

            // Simpan foto baru
            $gambar = $request->file('gambar')->store('galeri', 'public');

        } else {

            // Tetap gunakan foto lama
            $gambar = $galeri->gambar;
        }

        $galeri->update([
            'judul' => $request->judul,
            'gambar' => $gambar,
            'kategori' => $request->kategori,
        ]);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    // Hapus Data
    public function destroy(Galeri $galeri)
    {
        // Hapus file foto dari storage
        if ($galeri->gambar &&
            Storage::disk('public')->exists($galeri->gambar)) {

            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}