@extends('layouts.app')

@section('title', 'Profil Sekolah - SMK Negeri 1 Cijati')

@section('content')

<!-- HEADER HALAMAN -->
<section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-14">
    <div class="max-w-7xl mx-auto px-4 text-center">

        <h1 class="text-3xl md:text-4xl font-bold mb-2">
            Profil Sekolah
        </h1>

        <p class="text-blue-100">
            Mengenal lebih dekat {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
        </p>

    </div>
</section>


<section class="max-w-5xl mx-auto px-4 py-14">

@if($profil)

    <!-- DESKRIPSI / SEJARAH SINGKAT -->
    <div class="bg-white rounded-xl shadow p-8 mb-10">

        <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-2">

            <i class="fa-solid fa-book-open text-blue-700"></i>

            Sejarah Singkat

        </h2>

        <p class="text-gray-600 leading-relaxed">
            {{ $profil->deskripsi }}
        </p>

    </div>


    <!-- SAMBUTAN KEPALA SEKOLAH -->
    <div class="bg-white rounded-xl shadow p-8 mb-10">

        <div class="grid md:grid-cols-3 gap-8 items-center">

            <!-- FOTO KEPALA SEKOLAH -->
            <div class="md:col-span-1 text-center">

                @if($profil->foto_kepala_sekolah)

                    <img
                        src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                        alt="Foto Kepala Sekolah"
                        class="w-48 h-56 object-cover rounded-xl shadow-md mx-auto border border-gray-200"
                    >

                @else

                    <div class="w-48 h-56 bg-gray-100 rounded-xl shadow-md mx-auto flex items-center justify-center border border-gray-200">

                        <div class="text-center text-gray-400">

                            <i class="fa-solid fa-user-tie text-5xl mb-3"></i>

                            <p class="text-sm">
                                Foto belum tersedia
                            </p>

                        </div>

                    </div>

                @endif

            </div>


            <!-- SAMBUTAN -->
            <div class="md:col-span-2">

                <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-2">

                    <i class="fa-solid fa-user-tie text-blue-700"></i>

                    Sambutan Kepala Sekolah

                </h2>


                @if($profil->sambutan_kepala_sekolah)

                    <p class="text-gray-600 leading-relaxed whitespace-pre-line">
                        {{ $profil->sambutan_kepala_sekolah }}
                    </p>

                @else

                    <p class="text-gray-400">
                        Sambutan Kepala Sekolah belum tersedia.
                    </p>

                @endif


                <p class="font-semibold text-gray-800 mt-5">
                    {{ $profil->kepala_sekolah }}
                </p>

                <p class="text-sm text-gray-500">
                    Kepala Sekolah
                </p>

            </div>

        </div>

    </div>


    <!-- VISI MISI -->
    <div class="grid md:grid-cols-2 gap-6 mb-10">


        <!-- VISI -->
        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="font-bold text-lg text-blue-800 mb-3">

                <i class="fa-solid fa-eye mr-2"></i>

                Visi

            </h3>

            <p class="text-gray-600 leading-relaxed">
                {{ $profil->visi }}
            </p>

        </div>


        <!-- MISI -->
        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="font-bold text-lg text-blue-800 mb-3">

                <i class="fa-solid fa-bullseye mr-2"></i>

                Misi

            </h3>

            <div class="text-gray-600 leading-relaxed whitespace-pre-line">
                {{ $profil->misi }}
            </div>

        </div>

    </div>


    <!-- TABEL INFORMASI PROFIL SEKOLAH -->
    <div class="bg-white rounded-xl shadow p-8">

        <h2 class="text-xl font-bold text-gray-800 mb-5 flex items-center gap-2">

            <i class="fa-solid fa-table text-blue-700"></i>

            Tabel Informasi Sekolah

        </h2>


        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-blue-800 text-white">

                    <tr>

                        <th class="px-4 py-3 w-12">
                            No
                        </th>

                        <th class="px-4 py-3">
                            Keterangan
                        </th>

                        <th class="px-4 py-3">
                            Informasi
                        </th>

                    </tr>

                </thead>


                <tbody>


                    <!-- NAMA SEKOLAH -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            1
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Nama Sekolah
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->nama_sekolah }}
                        </td>

                    </tr>


                    <!-- NPSN -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            2
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            NPSN
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->npsn }}
                        </td>

                    </tr>


                    <!-- AKREDITASI -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            3
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Akreditasi
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->akreditasi }}
                        </td>

                    </tr>


                    <!-- ALAMAT -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            4
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Alamat
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->alamat }}
                        </td>

                    </tr>


                    <!-- TELEPON -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            5
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Telepon
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->telepon }}
                        </td>

                    </tr>


                    <!-- EMAIL -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            6
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Email
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->email }}
                        </td>

                    </tr>


                    <!-- WEBSITE -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            7
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Website
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->website }}
                        </td>

                    </tr>


                    <!-- KEPALA SEKOLAH -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            8
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Kepala Sekolah
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->kepala_sekolah }}
                        </td>

                    </tr>


                    <!-- TAHUN BERDIRI -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            9
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Tahun Berdiri
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->tahun_berdiri }}
                        </td>

                    </tr>


                    <!-- JUMLAH SISWA -->
                    <tr class="border-t border-gray-200">

                        <td class="px-4 py-3">
                            10
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Jumlah Siswa
                        </td>

                        <td class="px-4 py-3">
                            {{ $profil->jumlah_siswa }}
                        </td>

                    </tr>


                </tbody>

            </table>

        </div>

    </div>


@else

    <div class="bg-white rounded-xl shadow p-8 text-center">

        <p class="text-gray-400">
            Belum ada data profil sekolah.
        </p>

    </div>

@endif

</section>

@endsection