@extends('layouts.app')

@section('title', 'Beranda - SMK Negeri 1 Cijati')

@section('content')

<!-- HERO SECTION --><section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-20"><div class="max-w-7xl mx-auto px-4 text-center">

    <h1 class="text-3xl md:text-5xl font-bold mb-4">
        {{ $beranda->judul ?? 'Selamat Datang di SMK Negeri 1 Cijati' }}
    </h1>

    <p class="text-lg text-blue-100 max-w-2xl mx-auto">
        {{ $beranda->deskripsi ?? 'Mewujudkan generasi cerdas, berkarakter, dan berdaya saing global melalui pendidikan berkualitas.' }}
    </p>

    <!-- TOMBOL PROFIL -->
    <a
        href="{{ route('profil') }}"
        class="inline-block mt-6 bg-yellow-400 text-blue-900 font-semibold px-6 py-3 rounded-full hover:bg-yellow-300 transition"
    >
        Lihat Profil Sekolah
        <i class="fa-solid fa-arrow-right ml-1"></i>
    </a>

</div>

</section><!-- STATISTIK --><section class="max-w-7xl mx-auto px-4 -mt-10 relative z-10"><div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:-translate-y-1 transition transform">

        <i class="fa-solid fa-chalkboard-user text-4xl text-blue-700 mb-3"></i>

        <h2 class="text-3xl font-bold text-gray-800">
            {{ $jumlahGuru }}
        </h2>

        <p class="text-gray-500">
            Guru Aktif
        </p>

    </div>


    <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:-translate-y-1 transition transform">

        <i class="fa-solid fa-user-graduate text-4xl text-yellow-500 mb-3"></i>

        <h2 class="text-3xl font-bold text-gray-800">
            {{ $jumlahSiswa }}
        </h2>

        <p class="text-gray-500">
            Siswa Aktif
        </p>

    </div>


    <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:-translate-y-1 transition transform">

        <i class="fa-solid fa-users-gear text-4xl text-green-600 mb-3"></i>

        <h2 class="text-3xl font-bold text-gray-800">
            {{ $jumlahStaff }}
        </h2>

        <p class="text-gray-500">
            Staff Sekolah
        </p>

    </div>

</div>

</section><!-- BERITA KEGIATAN --><section class="max-w-7xl mx-auto px-4 py-16"><div class="flex justify-between items-center mb-8">

    <h2 class="text-2xl font-bold text-gray-800">
        Berita & Kegiatan Sekolah
    </h2>

    <span class="text-sm text-gray-400">
        Terbaru
    </span>

</div>


<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @forelse($berita as $b)

    <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden group">

        <div class="h-40 bg-blue-100 flex items-center justify-center overflow-hidden">

            @if($b->gambar)

                <img
                    src="{{ $b->gambar }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                >

            @else

                <i class="fa-solid fa-newspaper text-5xl text-blue-300"></i>

            @endif

        </div>


        <div class="p-5">

            <span class="text-xs text-yellow-600 font-semibold">
                {{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}
            </span>

            <h3 class="font-bold text-lg mt-1 mb-2 text-gray-800">
                {{ $b->judul }}
            </h3>

            <p class="text-gray-500 text-sm">
                {{ Str::limit($b->isi, 90) }}
            </p>

        </div>

    </div>

    @empty

        <p class="text-gray-500">
            Belum ada berita.
        </p>

    @endforelse

</div>

</section><!-- GALERI SEKOLAH --><section class="bg-white py-16"><div class="max-w-7xl mx-auto px-4">

    <div class="flex justify-between items-center mb-8">

        <h2 class="text-2xl font-bold text-gray-800">
            Galeri Sekolah
        </h2>

        <a
            href="{{ route('galeri') }}"
            class="text-blue-700 text-sm font-semibold hover:underline"
        >
            Lihat Semua
            <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>

    </div>


    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">

        @foreach($galeri as $g)

        <div class="overflow-hidden rounded-lg shadow group cursor-pointer">

            <img
                src="{{ $g->gambar }}"
                alt="{{ $g->judul }}"
                class="w-full h-28 object-cover group-hover:scale-110 transition duration-300"
            >

        </div>

        @endforeach

    </div>

</div>

</section><!-- CALL TO ACTION --><section class="bg-blue-800 text-white py-12 text-center"><h2 class="text-2xl font-bold mb-3">
    {{ $beranda->judul_cta ?? 'Tertarik Bergabung dengan Kami?' }}
</h2>

<p class="text-blue-100 mb-6">
    {{ $beranda->deskripsi_cta ?? 'Segera daftarkan diri Anda menjadi bagian dari keluarga besar sekolah kami.' }}
</p>

<a
    href="{{ route('kontak') }}"
    class="bg-yellow-400 text-blue-900 font-semibold px-6 py-3 rounded-full hover:bg-yellow-300 transition"
>
    Hubungi Kami
</a>

</section><!-- LOGIN ADMIN DI POJOK --><a
href="{{ route('admin.login') }}"
class="fixed bottom-5 right-5 bg-blue-700 hover:bg-blue-800 text-white text-xs px-4 py-2 rounded-full shadow-lg transition z-50"
title="Login Admin"

«»

<i class="fa-solid fa-lock mr-1"></i>
Admin

</a>@endsection