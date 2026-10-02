@extends('layouts.app')

@section('title', 'Jurusan - SMK Negeri 1 Cijati')

@section('content')

<section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-14">
    <div class="max-w-7xl mx-auto px-4 text-center">

        <h1 class="text-3xl md:text-4xl font-bold mb-2">
            Jurusan
        </h1>

        <p class="text-blue-100">
            Pilihan jurusan yang tersedia di sekolah kami
        </p>

    </div>
</section>


<section class="max-w-7xl mx-auto px-4 py-14">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        @foreach($jurusan as $j)

            <a
                href="{{ route('jurusan.show', $j->id) }}"
                class="block bg-white rounded-xl shadow hover:shadow-2xl hover:-translate-y-1 transition p-6 text-center group"
            >

                <!-- LOGO JURUSAN -->
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-blue-100 flex items-center justify-center overflow-hidden">

                    @if($j->gambar)

                        <img
                            src="{{ asset('storage/' . $j->gambar) }}"
                            alt="Logo {{ $j->nama_jurusan }}"
                            class="w-full h-full object-cover"
                        >

                    @else

                        <i class="fa-solid fa-school text-3xl text-blue-700"></i>

                    @endif

                </div>


                <!-- NAMA JURUSAN -->
                <h3 class="font-bold text-lg text-gray-800 mb-2">
                    {{ $j->nama_jurusan }}
                </h3>


                <!-- DESKRIPSI -->
                <p class="text-gray-500 text-sm">
                    {{ $j->deskripsi }}
                </p>


                <!-- TOMBOL -->
                <div class="mt-5">

                    <span class="inline-block bg-blue-600 group-hover:bg-yellow-400 text-white group-hover:text-gray-800 font-semibold px-5 py-2 rounded-lg transition">
                        Lihat Detail →
                    </span>

                </div>

            </a>

        @endforeach

    </div>

</section>

@endsection