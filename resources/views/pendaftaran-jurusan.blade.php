@extends('layouts.app')

@section('title', 'Pendaftaran Jurusan - SMK Negeri 1 Cijati')

@section('content')

<section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-3">
            Pendaftaran Jurusan
        </h1>

        <p class="text-blue-100">
            Silakan isi formulir pendaftaran calon siswa di bawah ini.
        </p>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4">

        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $jurusan->nama_jurusan }}
                </h2>

                @if($jurusan->kode)
                    <p class="text-gray-500 mt-1">
                        Kode: {{ $jurusan->kode }}
                    </p>
                @endif
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('jurusan.daftar.simpan', $jurusan->id) }}" method="POST">
                @csrf

                <!-- NAMA LENGKAP -->
                <div class="mb-5">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama_lengkap"
                        value="{{ old('nama_lengkap') }}"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nama lengkap"
                    >
                </div>

                <!-- ASAL SMP / MTS -->
                <div class="mb-5">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Asal SMP/MTs
                    </label>

                    <input
                        type="text"
                        name="asal_sekolah"
                        value="{{ old('asal_sekolah') }}"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Contoh: SMP Negeri 1 Cijati"
                    >
                </div>

                <!-- NISN -->
                <div class="mb-5">
                    <label class="block font-semibold text-gray-700 mb-2">
                        NISN
                    </label>

                    <input
                        type="text"
                        name="nisn"
                        value="{{ old('nisn') }}"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan NISN"
                    >
                </div>

                <!-- NOMOR WHATSAPP -->
                <div class="mb-5">
                    <label class="block font-semibold text-gray-700 mb-2">
                        No. WhatsApp
                    </label>

                    <input
                        type="text"
                        name="no_whatsapp"
                        value="{{ old('no_whatsapp') }}"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Contoh: 081234567890"
                    >
                </div>

                <!-- PILIHAN JURUSAN -->
                <div class="mb-6">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Pilihan Jurusan
                    </label>

                    <input
                        type="text"
                        value="{{ $jurusan->nama_jurusan }}"
                        readonly
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700"
                    >

                    <input
                        type="hidden"
                        name="pilihan_jurusan"
                        value="{{ $jurusan->nama_jurusan }}"
                    >

                    <p class="text-sm text-gray-500 mt-2">
                        Jurusan otomatis sesuai dengan jurusan yang dipilih.
                    </p>
                </div>

                <!-- BUTTON -->
                <div class="flex gap-3">

                    <a
                        href="{{ route('jurusan.show', $jurusan->id) }}"
                        class="w-1/2 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 rounded-lg transition"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition"
                    >
                        Daftar Sekarang
                    </button>

                </div>

            </form>

        </div>

    </div>
</section>

@endsection