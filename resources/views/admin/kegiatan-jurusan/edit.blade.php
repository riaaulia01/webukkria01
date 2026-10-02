@extends('layouts.app')

@section('title', 'Edit Kegiatan Jurusan - Admin')

@section('content')

<section class="py-10 bg-gray-100 min-h-screen"><div class="max-w-3xl mx-auto px-4">

    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                Edit Kegiatan Jurusan
            </h1>

            <p class="text-gray-500 mt-1">
                Ubah informasi dan foto kegiatan jurusan.
            </p>
        </div>

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
            action="{{ route('admin.kegiatan-jurusan.update', $kegiatanJurusan->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <!-- JURUSAN -->
            <div class="mb-5">

                <label class="block font-semibold text-gray-700 mb-2">
                    Jurusan
                </label>

                <select
                    name="jurusan_id"
                    required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >

                    @foreach($jurusans as $jurusan)

                        <option
                            value="{{ $jurusan->id }}"
                            {{ old('jurusan_id', $kegiatanJurusan->jurusan_id) == $jurusan->id ? 'selected' : '' }}
                        >
                            {{ $jurusan->nama_jurusan }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- JUDUL -->
            <div class="mb-5">

                <label class="block font-semibold text-gray-700 mb-2">
                    Judul Kegiatan
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ old('judul', $kegiatanJurusan->judul) }}"
                    required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >

            </div>

            <!-- DESKRIPSI -->
            <div class="mb-5">

                <label class="block font-semibold text-gray-700 mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >{{ old('deskripsi', $kegiatanJurusan->deskripsi) }}</textarea>

            </div>

            <!-- UPLOAD FOTO -->
            <div class="mb-6">

                <label class="block font-semibold text-gray-700 mb-2">
                    Upload Foto Kegiatan
                </label>

                <input
                    type="file"
                    name="gambar"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >

                <p class="text-sm text-gray-500 mt-2">
                    Pilih foto baru jika ingin mengganti foto yang lama.
                    Format JPG, JPEG, PNG, atau WEBP.
                </p>

                @if($kegiatanJurusan->gambar)

                    <div class="mt-4">

                        <p class="text-sm text-gray-500 mb-2">
                            Foto saat ini:
                        </p>

                        <img
                            src="{{ asset('storage/' . $kegiatanJurusan->gambar) }}"
                            alt="{{ $kegiatanJurusan->judul }}"
                            class="w-48 h-32 object-cover rounded-lg shadow"
                        >

                    </div>

                @endif

            </div>

            <!-- TOMBOL -->
            <div class="flex gap-3">

                <a
                    href="{{ route('admin.kegiatan-jurusan.index') }}"
                    class="w-1/2 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 rounded-lg transition"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</section>@endsection