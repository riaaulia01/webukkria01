@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<section class="py-10">
    <div class="container mx-auto px-4">

        <!-- JUDUL -->
        <div class="w-full flex flex-col items-center text-center mb-10">

            <h2 class="font-bold text-2xl md:text-3xl mb-2">
                Galeri Sekolah
            </h2>

            <p class="text-gray-500">
                Dokumentasi kegiatan dan fasilitas sekolah
            </p>

        </div>


        <!-- GALERI -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @forelse($galeris as $galeri)

                <!-- FOTO KECIL -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden cursor-pointer
                            hover:shadow-xl transition duration-300"
                     onclick="bukaFoto('{{ asset('storage/' . $galeri->gambar) }}',
                                        '{{ $galeri->judul }}')">

                    <img src="{{ asset('storage/' . $galeri->gambar) }}"
                         alt="{{ $galeri->judul }}"
                         class="w-full h-48 object-cover">

                    <div class="p-3 text-center">

                        <h3 class="font-semibold text-gray-800">
                            {{ $galeri->judul }}
                        </h3>

                        @if($galeri->kategori)
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $galeri->kategori }}
                            </p>
                        @endif

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center">
                    <p class="text-gray-500">
                        Belum ada foto galeri.
                    </p>
                </div>

            @endforelse

        </div>

    </div>
</section>


<!-- POPUP FOTO BESAR -->
<div id="fotoModal"
     class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4"
     onclick="tutupFoto()">

    <div class="relative max-w-4xl w-full"
         onclick="event.stopPropagation()">

        <!-- TOMBOL CLOSE -->
        <button type="button"
                onclick="tutupFoto()"
                class="absolute -top-12 right-0 text-white text-3xl font-bold
                       hover:text-gray-300">
            &times;
        </button>

        <!-- FOTO BESAR -->
        <img id="fotoBesar"
             src=""
             alt=""
             class="w-full max-h-[80vh] object-contain rounded-lg">

        <!-- JUDUL -->
        <p id="judulFoto"
           class="text-white text-center font-semibold mt-3 text-lg">
        </p>

    </div>

</div>


<!-- JAVASCRIPT -->
<script>

    function bukaFoto(gambar, judul) {

        const modal = document.getElementById('fotoModal');
        const foto = document.getElementById('fotoBesar');
        const judulFoto = document.getElementById('judulFoto');

        foto.src = gambar;
        foto.alt = judul;
        judulFoto.textContent = judul;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function tutupFoto() {

        const modal = document.getElementById('fotoModal');
        const foto = document.getElementById('fotoBesar');

        modal.classList.remove('flex');
        modal.classList.add('hidden');

        foto.src = '';
    }

</script>

@endsection