@extends('layouts.app')

@section('title', 'Tambah Ekstrakurikuler')

@section('content')

<div class="container mx-auto px-4 py-8">

    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Tambah Ekstrakurikuler
        </h1>

        <form
            action="{{ route('admin.ekstrakurikuler.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <!-- NAMA -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Nama Ekstrakurikuler
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Pramuka"
                    required
                >

                @error('nama')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- PEMBINA -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Pembina
                </label>

                <input
                    type="text"
                    name="pembina"
                    value="{{ old('pembina') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Nama pembina"
                >
            </div>


            <!-- JADWAL -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Jadwal
                </label>

                <input
                    type="text"
                    name="jadwal"
                    value="{{ old('jadwal') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Jumat, 14.00 - 16.00"
                >
            </div>


            <!-- DESKRIPSI -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Deskripsi ekstrakurikuler"
                >{{ old('deskripsi') }}</textarea>
            </div>


            <!-- GAMBAR -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Logo Ekstrakurikuler
                </label>

                <input
                    type="file"
                    name="gambar"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                <p class="text-gray-500 text-sm mt-2">
                    Pilih gambar dari HP atau komputer. Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </p>

                @error('gambar')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- BUTTON -->
            <div class="flex justify-between">

                <a
                    href="{{ route('admin.ekstrakurikuler.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg"
                >
                    <i class="fas fa-save mr-1"></i>
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection