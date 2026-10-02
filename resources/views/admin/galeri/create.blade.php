@extends('layouts.app')

@section('title', 'Tambah Galeri')

@section('content')

<div class="container mx-auto px-4 py-8">

    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Tambah Galeri
        </h1>

        <form action="{{ route('admin.galeri.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Judul
                </label>

                <input type="text"
                       name="judul"
                       value="{{ old('judul') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2"
                       placeholder="Masukkan judul galeri"
                       required>
            </div>


            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Foto
                </label>

                <input type="file"
                       name="gambar"
                       accept="image/*"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white"
                       required>

                <p class="text-sm text-gray-500 mt-1">
                    Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </p>
            </div>


            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    Kategori
                </label>

                <input type="text"
                       name="kategori"
                       value="{{ old('kategori') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2"
                       placeholder="Contoh: Kegiatan Sekolah">
            </div>


            <div class="flex justify-end gap-3">

                <a href="{{ route('admin.galeri.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Batal
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection