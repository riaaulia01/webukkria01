@extends('layouts.app')

@section('title', 'Ekstrakurikuler - SMK Negeri 1 Cijati')

@section('content')

<!-- HEADER -->
<section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-14">
    <div class="max-w-7xl mx-auto px-4 text-center">

        <h1 class="text-3xl md:text-4xl font-bold mb-2">
            Ekstrakurikuler
        </h1>

        <p class="text-blue-100">
            Pilih ekstrakurikuler yang ingin kamu ketahui
        </p>

    </div>
</section>


<!-- DAFTAR EKSTRAKURIKULER -->
<section class="py-12 bg-gray-50">

    <div class="max-w-7xl mx-auto px-4">

        @if($ekskul->count() > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($ekskul as $e)

                    <a
                        href="{{ route('ekstrakurikuler.show', $e->id) }}"
                        class="block group"
                    >

                        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 h-full">

                            <!-- LOGO EKSTRAKURIKULER -->
                            <div class="w-24 h-24 mx-auto mt-6 mb-4 rounded-full bg-blue-100 flex items-center justify-center overflow-hidden">

                                @if($e->gambar)

                                    <img
                                        src="{{ asset('storage/' . $e->gambar) }}"
                                        alt="{{ $e->nama }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                    >

                                @else

                                    <i class="fa-solid fa-people-group text-4xl text-blue-600"></i>

                                @endif

                            </div>


                            <!-- ISI -->
                            <div class="p-6 pt-2">

                                <h2 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-blue-700 transition">
                                    {{ $e->nama }}
                                </h2>

                                @if($e->pembina)

                                    <p class="text-gray-600 mb-2">
                                        <i class="fa-solid fa-user-tie text-blue-600 mr-2"></i>
                                        Pembina: {{ $e->pembina }}
                                    </p>

                                @endif

                                @if($e->jadwal)

                                    <p class="text-gray-600 mb-4">
                                        <i class="fa-solid fa-calendar-days text-blue-600 mr-2"></i>
                                        {{ $e->jadwal }}
                                    </p>

                                @endif

                                <div class="inline-flex items-center gap-2 text-blue-700 font-semibold">
                                    Lihat Detail
                                    <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition"></i>
                                </div>

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>

        @else

            <div class="bg-white rounded-2xl shadow-md p-8 text-center">

                <i class="fa-solid fa-circle-info text-4xl text-blue-600 mb-4"></i>

                <h2 class="text-xl font-bold text-gray-800 mb-2">
                    Belum Ada Data Ekstrakurikuler
                </h2>

                <p class="text-gray-600">
                    Data ekstrakurikuler belum tersedia.
                </p>

            </div>

        @endif

    </div>

</section>

@endsection