<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'akreditasi',
        'alamat',
        'telepon',
        'email',
        'website',
        'kepala_sekolah',
        'foto_kepala_sekolah',
        'sambutan_kepala_sekolah',
        'tahun_berdiri',
        'jumlah_siswa',
        'visi',
        'misi',
        'deskripsi',
    ];
}