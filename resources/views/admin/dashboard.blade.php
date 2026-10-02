@extends('layouts.app')

@section('title', 'Dashboard Admin - SMK Negeri 1 Cijati')

@section('content')

<!-- HEADER DASHBOARD --><section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white"><div class="max-w-7xl mx-auto px-4 py-12">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

        <div>

            <p class="text-blue-200 mb-2">
                Panel Pengelolaan Website
            </p>

            <h1 class="text-3xl md:text-4xl font-bold">
                Dashboard Admin
            </h1>

            <p class="mt-3 text-blue-100">
                Selamat datang, Admin. Silakan pilih data yang ingin dikelola.
            </p>

        </div>

        <div>

            <a
                href="{{ route('admin.logout') }}"
                class="inline-flex items-center gap-2 bg-white text-blue-700 px-5 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow"
            >

                <i class="fa-solid fa-right-from-bracket"></i>
                Logout

            </a>

        </div>

    </div>

</div>

</section><!-- MENU ADMIN --><section class="max-w-7xl mx-auto px-4 py-12"><div class="mb-8">

    <h2 class="text-2xl font-bold text-gray-800">
        Kelola Data Website
    </h2>

    <p class="text-gray-500 mt-2">
        Pilih menu di bawah untuk menambah, mengedit, atau menghapus data.
    </p>

</div>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


    <!-- BERANDA -->
    <a
        href="{{ route('admin.beranda.edit') }}"
        class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition group"
    >

        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

            <i class="fa-solid fa-house text-2xl text-blue-700 group-hover:text-white transition"></i>

        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-2">
            Beranda
        </h3>

        <p class="text-sm text-gray-500">
            Kelola judul dan informasi yang tampil di halaman beranda.
        </p>

    </a>


    <!-- PROFIL SEKOLAH -->
    <a
        href="{{ route('admin.profil.edit') }}"
        class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition group"
    >

        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

            <i class="fa-solid fa-school text-2xl text-blue-700 group-hover:text-white transition"></i>

        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-2">
            Profil Sekolah
        </h3>

        <p class="text-sm text-gray-500">
            Kelola informasi dan data profil sekolah.
        </p>

    </a>


    <!-- GURU & STAFF -->
    <a
        href="{{ route('admin.guru-staff.index') }}"
        class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition group"
    >

        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

            <i class="fa-solid fa-user-tie text-2xl text-blue-700 group-hover:text-white transition"></i>

        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-2">
            Guru & Staff
        </h3>

        <p class="text-sm text-gray-500">
            Kelola data guru dan staff sekolah.
        </p>

    </a>


    <!-- JURUSAN -->
    <a
        href="{{ route('admin.jurusan.index') }}"
        class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition group"
    >

        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

            <i class="fa-solid fa-graduation-cap text-2xl text-blue-700 group-hover:text-white transition"></i>

        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-2">
            Jurusan
        </h3>

        <p class="text-sm text-gray-500">
            Kelola data jurusan yang tersedia di sekolah.
        </p>

    </a>


    <!-- PENDAFTAR JURUSAN -->
    <a
        href="{{ route('admin.pendaftaran-jurusan.index') }}"
        class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition group"
    >

        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

            <i class="fa-solid fa-user-plus text-2xl text-blue-700 group-hover:text-white transition"></i>

        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-2">
            Pendaftar Jurusan
        </h3>

        <p class="text-sm text-gray-500">
            Lihat data calon siswa yang telah mendaftar jurusan.
        </p>

    </a>


    <!-- EKSTRAKURIKULER -->
    <a
        href="{{ route('admin.ekstrakurikuler.index') }}"
        class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition group"
    >

        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

            <i class="fa-solid fa-people-group text-2xl text-blue-700 group-hover:text-white transition"></i>

        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-2">
            Ekstrakurikuler
        </h3>

        <p class="text-sm text-gray-500">
            Kelola kegiatan ekstrakurikuler sekolah.
        </p>

    </a>


    <!-- PENDAFTAR EKSTRAKURIKULER -->
    <a
        href="{{ route('admin.pendaftaran-ekstrakurikuler.index') }}"
        class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition group"
    >

        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

            <i class="fa-solid fa-clipboard-list text-2xl text-blue-700 group-hover:text-white transition"></i>

        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-2">
            Pendaftar Ekstrakurikuler
        </h3>

        <p class="text-sm text-gray-500">
            Lihat data siswa yang telah mendaftar ekstrakurikuler.
        </p>

    </a>


    <!-- GALERI -->
    <a
        href="{{ route('admin.galeri.index') }}"
        class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition group"
    >

        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

            <i class="fa-solid fa-images text-2xl text-blue-700 group-hover:text-white transition"></i>

        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-2">
            Galeri
        </h3>

        <p class="text-sm text-gray-500">
            Kelola foto dan dokumentasi kegiatan sekolah.
        </p>

    </a>


</div>


<!-- KEMBALI KE WEBSITE -->
<div class="mt-10 text-center">

    <a
        href="{{ route('home') }}"
        class="inline-flex items-center gap-2 text-blue-700 font-semibold hover:text-blue-900 transition"
    >

        <i class="fa-solid fa-house"></i>

        Kembali ke Website

    </a>

</div>

</section>@endsection