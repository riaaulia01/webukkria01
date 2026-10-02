<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'judul_cta',
        'deskripsi_cta',
    ];
}