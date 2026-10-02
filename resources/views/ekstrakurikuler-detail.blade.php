@extends('layouts.app')

@section('title', $ekstrakurikuler->nama . ' - SMK Negeri 1 Cijati')

@section('content')

{{-- =========================
     HEADER
========================= --}}

<section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-16">

    <div class="max-w-7xl mx-auto px-4 text-center">

        <h1 class="text-3xl md:text-5xl font-bold mb-4">
            {{ $ekstrakurikuler->nama }}
        </h1>

        <p class="text-blue-100">
            Ekstrakurikuler SMK Negeri 1 Cijati
        </p>

    </div>

</section>


{{-- =========================
     DETAIL EKSTRAKURIKULER
========================= --}}

<section class="py-12 bg-gray-50">

    <div class="max-w-5xl mx-auto px-4">

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">


            {{-- =========================
                 LOGO EKSTRAKURIKULER
            ========================== --}}

            <div class="py-8 flex justify-center bg-white">

                @if($ekstrakurikuler->gambar)

                    <img
                        src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                        alt="Logo {{ $ekstrakurikuler->nama }}"
                        class="w-48 h-48 object-cover rounded-full border-4 border-blue-100 shadow"
                    >

                @else

                    <div class="w-48 h-48 rounded-full bg-blue-100 flex items-center justify-center">

                        <i class="fa-solid fa-people-group text-6xl text-blue-600"></i>

                    </div>

                @endif

            </div>


            {{-- =========================
                 INFORMASI
            ========================== --}}

            <div class="p-8">


                {{-- JUDUL --}}

                <h2 class="text-2xl font-bold text-gray-800 mb-6">

                    Tentang {{ $ekstrakurikuler->nama }}

                </h2>


                {{-- =========================
                     PEMBINA & JADWAL
                ========================== --}}

                <div class="grid md:grid-cols-2 gap-6 mb-8">


                    {{-- PEMBINA --}}

                    <div class="bg-blue-50 rounded-xl p-5">

                        <div class="flex items-center gap-3">

                            <i class="fa-solid fa-user-tie text-blue-700 text-2xl"></i>

                            <div>

                                <p class="text-sm text-gray-500">
                                    Pembina
                                </p>

                                <p class="font-semibold text-gray-800">
                                    {{ $ekstrakurikuler->pembina ?? '-' }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- JADWAL --}}

                    <div class="bg-blue-50 rounded-xl p-5">

                        <div class="flex items-center gap-3">

                            <i class="fa-solid fa-calendar-days text-blue-700 text-2xl"></i>

                            <div>

                                <p class="text-sm text-gray-500">
                                    Jadwal
                                </p>

                                <p class="font-semibold text-gray-800">
                                    {{ $ekstrakurikuler->jadwal ?? '-' }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =========================
                     DESKRIPSI
                ========================== --}}

                <div class="mb-10">

                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        Deskripsi
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        {{ $ekstrakurikuler->deskripsi ?? 'Belum ada deskripsi.' }}
                    </p>

                </div>


                {{-- =========================
                     FOTO KEGIATAN
                ========================== --}}

                <div class="mb-10">

                    <h3 class="text-2xl font-bold text-gray-800 mb-2">
                        Foto Kegiatan
                    </h3>

                    <p class="text-gray-500 mb-6">
                        Dokumentasi kegiatan {{ $ekstrakurikuler->nama }}.
                    </p>


                    @if($ekstrakurikuler->fotoKegiatan()->exists())

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">

                            @foreach($ekstrakurikuler->fotoKegiatan as $foto)

                                <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100">

                                    <img
                                        src="{{ asset('storage/' . $foto->foto) }}"
                                        alt="Foto kegiatan {{ $ekstrakurikuler->nama }}"
                                        class="w-full h-56 object-cover hover:scale-105 transition duration-300"
                                    >

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="bg-gray-50 border border-dashed border-gray-300 rounded-xl p-8 text-center">

                            <i class="fa-solid fa-images text-4xl text-gray-400 mb-3"></i>

                            <p class="text-gray-500">
                                Belum ada foto kegiatan.
                            </p>

                        </div>

                    @endif

                </div>


                {{-- =========================
                     TOMBOL DAFTAR
                ========================== --}}

                <div class="mb-6">

                    <a
                        href="{{ route('ekstrakurikuler.daftar', $ekstrakurikuler->id) }}"
                        class="inline-flex items-center gap-2 bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-lg font-semibold transition shadow"
                    >

                        <i class="fa-solid fa-user-plus"></i>

                        Daftar Ekstrakurikuler

                    </a>

                </div>


                {{-- =========================
                     TOMBOL KEMBALI
                ========================== --}}

                <div>

                    <a
                        href="{{ route('ekstrakurikuler') }}"
                        class="inline-flex items-center gap-2 bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-lg transition"
                    >

                        <i class="fa-solid fa-arrow-left"></i>

                        Kembali ke Ekstrakurikuler

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
