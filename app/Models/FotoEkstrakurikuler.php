<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ekstrakurikuler;

class FotoEkstrakurikuler extends Model
{
    protected $fillable = [
        'ekstrakurikuler_id',
        'foto',
    ];

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class);
    }
}
