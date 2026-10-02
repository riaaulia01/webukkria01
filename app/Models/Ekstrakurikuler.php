<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $fillable = [
        'nama',
        'pembina',
        'jadwal',
        'deskripsi',
        'gambar',
    ];

    // =========================
    // RELASI FOTO KEGIATAN
    // =========================
    public function fotoKegiatan()
    {
        return $this->hasMany(FotoEkstrakurikuler::class, 'ekstrakurikuler_id');
    }
}
