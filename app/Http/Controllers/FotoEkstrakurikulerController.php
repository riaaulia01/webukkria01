<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\FotoEkstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoEkstrakurikulerController extends Controller
{
    // =========================
    // UPLOAD FOTO KEGIATAN
    // =========================
    public function store(Request $request, $ekstrakurikuler_id)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Pastikan ekstrakurikuler tersedia
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($ekstrakurikuler_id);

        // Simpan file foto
        $fotoPath = $request->file('foto')->store(
            'foto-ekstrakurikuler',
            'public'
        );

        // Simpan data foto ke database
        FotoEkstrakurikuler::create([
            'ekstrakurikuler_id' => $ekstrakurikuler->id,
            'foto' => $fotoPath,
        ]);

        return back()->with(
            'success',
            'Foto kegiatan berhasil ditambahkan.'
        );
    }


    // =========================
    // HAPUS FOTO KEGIATAN
    // =========================
    public function destroy($id)
    {
        $foto = FotoEkstrakurikuler::findOrFail($id);

        // Hapus file foto dari storage
        if ($foto->foto && Storage::disk('public')->exists($foto->foto)) {
            Storage::disk('public')->delete($foto->foto);
        }

        // Hapus data foto dari database
        $foto->delete();

        return back()->with(
            'success',
            'Foto kegiatan berhasil dihapus.'
        );
    }
}
