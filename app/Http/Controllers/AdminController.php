<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beranda;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function prosesLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username === 'admin' && $password === 'admin123') {
            session(['admin_login' => true]);

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function dashboard()
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        return view('admin.dashboard');
    }

    // =========================
    // EDIT BERANDA
    // =========================

    public function editBeranda()
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $beranda = Beranda::first();

        if (!$beranda) {
            $beranda = Beranda::create([
                'judul' => 'Selamat Datang di SMK Negeri 1 Cijati',
                'deskripsi' => 'Mewujudkan generasi cerdas, berkarakter, dan berdaya saing global melalui pendidikan berkualitas.',
                'judul_cta' => 'Tertarik Bergabung dengan Kami?',
                'deskripsi_cta' => 'Segera daftarkan diri Anda menjadi bagian dari keluarga besar sekolah kami.',
            ]);
        }

        return view('admin.beranda.edit', compact('beranda'));
    }

    public function updateBeranda(Request $request)
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'judul_cta' => 'required',
            'deskripsi_cta' => 'required',
        ]);

        $beranda = Beranda::first();

        $beranda->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'judul_cta' => $request->judul_cta,
            'deskripsi_cta' => $request->deskripsi_cta,
        ]);

        return redirect()
            ->route('admin.beranda.edit')
            ->with('success', 'Data Beranda berhasil diperbarui!');
    }

    public function logout()
    {
        session()->forget('admin_login');

        return redirect()->route('admin.login');
    }
}