<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranJurusan;

class AdminPendaftaranJurusanController extends Controller
{
    public function index()
    {
        $pendaftarans = PendaftaranJurusan::latest()->get();

        return view('admin.pendaftaran-jurusan.index', compact('pendaftarans'));
    }

    public function destroy($id)
    {
        $pendaftaran = PendaftaranJurusan::findOrFail($id);

        $pendaftaran->delete();

        return back()->with('success', 'Data pendaftar berhasil dihapus!');
    }
}