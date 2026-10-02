<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PendaftaranEkstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans_ekstrakurikuler';

    protected $fillable = [
        'nama',
        'kelas',
        'nis',
        'whatsapp',
        'ekstrakurikuler_id',
    ];

    public function ekstrakurikuler()
    {
        return $this->belongsTo(
            Ekstrakurikuler::class,
            'ekstrakurikuler_id'
        );
    }
}