@extends('layouts.app')

@section('title', 'Tambah Jurusan')

@section('content')

<div class="container mx-auto px-4 py-8">

    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Tambah Jurusan
        </h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('admin.jurusan.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <!-- NAMA JURUSAN -->
            <div class="mb-4">

                <label class="block text-gray-700 font-semibold mb-2">
                    Nama Jurusan
                </label>

                <input
                    type="text"
                    name="nama_jurusan"
                    value="{{ old('nama_jurusan') }}"
                    required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Pengembangan Perangkat Lunak dan Gim"
                >

                @error('nama_jurusan')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- KODE -->
            <div class="mb-4">

                <label class="block text-gray-700 font-semibold mb-2">
                    Kode Jurusan
                </label>

                <input
                    type="text"
                    name="kode"
                    value="{{ old('kode') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: PPLG"
                >

                @error('kode')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- DESKRIPSI -->
            <div class="mb-4">

                <label class="block text-gray-700 font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan deskripsi jurusan"
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- LOGO / GAMBAR -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Logo / Gambar Jurusan
                </label>

                <input
                    type="file"
                    name="gambar"
                    accept="image/*"
                    required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                <p class="text-sm text-gray-500 mt-2">
                    Pilih logo atau gambar jurusan langsung dari HP/laptop.
                </p>

                @error('gambar')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- TOMBOL -->
            <div class="flex gap-3">

                <a
                    href="{{ route('admin.jurusan.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection