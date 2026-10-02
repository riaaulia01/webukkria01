<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranJurusan extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_jurusans';

    protected $fillable = [
        'nama_lengkap',
        'asal_sekolah',
        'nisn',
        'no_whatsapp',
        'pilihan_jurusan',
    ];
}