<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KegiatanJurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jurusan_id',
        'judul',
        'deskripsi',
        'gambar',
    ];

    public function jurusan()
    {
        return $this->belongsTo(
            Jurusan::class,
            'jurusan_id'
        );
    }
}