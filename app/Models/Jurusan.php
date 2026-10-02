<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PendaftaranJurusan;
use App\Models\KegiatanJurusan;

class Jurusan extends Model
{
    protected $fillable = [
        'nama_jurusan',
        'kode',
        'deskripsi',
        'gambar'
    ];

    public function pendaftarans()
    {
        return $this->hasMany(
            PendaftaranJurusan::class,
            'jurusan_id'
        );
    }

    public function kegiatan()
    {
        return $this->hasMany(
            KegiatanJurusan::class,
            'jurusan_id'
        );
    }
}