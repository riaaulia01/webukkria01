<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranEkstrakurikuler;

class PendaftaranEkstrakurikulerController extends Controller
{
    public function index()
    {
        $pendaftaran = PendaftaranEkstrakurikuler::with('ekstrakurikuler')
            ->latest()
            ->get();

        return view(
            'admin.pendaftaran-ekstrakurikuler.index',
            compact('pendaftaran')
        );
    }
}