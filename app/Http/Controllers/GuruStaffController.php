<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruStaffController extends Controller
{
    // HALAMAN GURU & STAFF (PUBLIC)
    public function index()
    {
        $gurus = Guru::where('jenis', 'Guru')->get();
        $staffs = Guru::where('jenis', 'Staff')->get();

        return view('guru-staff', compact('gurus', 'staffs'));
    }

    // HALAMAN DATA GURU & STAFF DI ADMIN
    public function adminIndex()
    {
        $gurus = Guru::latest()->get();

        return view('admin.guru-staff.index', compact('gurus'));
    }

    // FORM TAMBAH DATA
    public function create()
    {
        return view('admin.guru-staff.create');
    }

    // SIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'nullable',
            'jabatan' => 'nullable',
            'mapel' => 'nullable',
            'jenis' => 'required|in:Guru,Staff',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $foto = null;

        // Upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('guru', 'public');
        }

        Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'mapel' => $request->mapel,
            'jenis' => $request->jenis,
            'foto' => $foto,
        ]);

        return redirect()
            ->route('admin.guru-staff.index')
            ->with('success', 'Data Guru/Staff berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit(Guru $guru)
    {
        return view('admin.guru-staff.edit', compact('guru'));
    }

    // UPDATE DATA
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'nullable',
            'jabatan' => 'nullable',
            'mapel' => 'nullable',
            'jenis' => 'required|in:Guru,Staff',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $foto = $guru->foto;

        // Kalau upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }

            // Simpan foto baru
            $foto = $request->file('foto')->store('guru', 'public');
        }

        $guru->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'mapel' => $request->mapel,
            'jenis' => $request->jenis,
            'foto' => $foto,
        ]);

        return redirect()
            ->route('admin.guru-staff.index')
            ->with('success', 'Data Guru/Staff berhasil diperbarui.');
    }

    // HAPUS DATA
    public function destroy(Guru $guru)
    {
        // Hapus file foto dari storage
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru-staff.index')
            ->with('success', 'Data Guru/Staff berhasil dihapus.');
    }
}