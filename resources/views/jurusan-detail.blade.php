@extends('layouts.app')

@section('title', $jurusan->nama_jurusan . ' - SMK Negeri 1 Cijati')

@section('content')

<!-- HEADER --><section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-16">
    <div class="max-w-5xl mx-auto px-4 text-center">    <h1 class="text-3xl md:text-4xl font-bold mb-3">
        {{ $jurusan->nama_jurusan }}
    </h1>

    @if($jurusan->kode)
        <p class="text-blue-100">
            Kode Jurusan: {{ $jurusan->kode }}
        </p>
    @endif

</div>

</section><!-- DETAIL JURUSAN --><section class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- GAMBAR UTAMA JURUSAN -->
        @if($jurusan->gambar)
            <img
                src="{{ $jurusan->gambar }}"
                alt="{{ $jurusan->nama_jurusan }}"
                class="w-full h-64 object-cover"
            >
        @endif

        <div class="p-6 md:p-8">

            <!-- DESKRIPSI -->
            <h2 class="text-2xl font-bold text-gray-800 mb-4">
                Tentang Jurusan
            </h2>

            <p class="text-gray-600 leading-relaxed mb-8">
                {{ $jurusan->deskripsi }}
            </p>


            <!-- FOTO KEGIATAN -->
            <div class="mb-8">

                <h2 class="text-2xl font-bold text-gray-800 mb-5">
                    Foto Kegiatan Jurusan
                </h2>

                @if($jurusan->kegiatan->count() > 0)

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">

                        @foreach($jurusan->kegiatan as $kegiatan)

                            <div class="bg-white rounded-xl shadow-md overflow-hidden">

                                @if($kegiatan->gambar)

                                    <img
                                        src="{{ asset('storage/' . $kegiatan->gambar) }}"
                                        alt="{{ $kegiatan->judul }}"
                                        class="w-full h-48 object-cover"
                                    >

                                @else

                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500">
                                            Tidak ada foto
                                        </span>
                                    </div>

                                @endif

                                <div class="p-4">

                                    <h3 class="font-bold text-gray-800">
                                        {{ $kegiatan->judul }}
                                    </h3>

                                    @if($kegiatan->deskripsi)

                                        <p class="text-gray-600 text-sm mt-2">
                                            {{ $kegiatan->deskripsi }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="bg-gray-100 rounded-xl p-6 text-center text-gray-500">
                        Belum ada foto kegiatan untuk jurusan ini.
                    </div>

                @endif

            </div>


            <!-- PESAN SUKSES -->
            @if(session('success'))

                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>

            @endif


            <!-- TOMBOL -->
            <div class="flex flex-col sm:flex-row gap-3">

                <a
                    href="{{ route('jurusan') }}"
                    class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-3 rounded-lg transition"
                >
                    ← Kembali
                </a>

                <a
                    href="{{ route('jurusan.daftar', $jurusan->id) }}"
                    class="w-full sm:w-auto text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition"
                >
                    Daftar Jurusan
                </a>

            </div>

        </div>

    </div>

</div>

</section>@endsection