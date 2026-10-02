@extends('layouts.app')

@section('title', 'Edit Ekstrakurikuler')

@section('content')

<div class="container mx-auto px-4 py-8">

    <div class="max-w-4xl mx-auto space-y-6">

        {{-- =========================
             FORM EDIT EKSTRAKURIKULER
        ========================== --}}

        <div class="bg-white rounded-lg shadow p-6">

            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                Edit Ekstrakurikuler
            </h1>

            {{-- PESAN SUKSES --}}
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- PESAN ERROR --}}
            @if($errors->any())
                <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {{-- FORM EDIT --}}

            <form
                action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                {{-- NAMA --}}

                <div class="mb-4">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Nama Ekstrakurikuler
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $ekstrakurikuler->nama) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        required
                    >

                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- PEMBINA --}}

                <div class="mb-4">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Pembina
                    </label>

                    <input
                        type="text"
                        name="pembina"
                        value="{{ old('pembina', $ekstrakurikuler->pembina) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >

                </div>


                {{-- JADWAL --}}

                <div class="mb-4">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Jadwal
                    </label>

                    <input
                        type="text"
                        name="jadwal"
                        value="{{ old('jadwal', $ekstrakurikuler->jadwal) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >

                </div>


                {{-- DESKRIPSI --}}

                <div class="mb-4">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>

                </div>


                {{-- LOGO EKSTRAKURIKULER --}}

                <div class="mb-6">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Logo Ekstrakurikuler
                    </label>

                    @if($ekstrakurikuler->gambar)

                        <div class="mb-3">

                            <img
                                src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                                alt="Logo {{ $ekstrakurikuler->nama }}"
                                class="w-24 h-24 object-cover rounded-lg border"
                            >

                        </div>

                    @endif


                    <input
                        type="file"
                        name="gambar"
                        accept="image/jpeg,image/png,image/webp"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white"
                    >

                    <p class="text-gray-500 text-sm mt-2">
                        Pilih logo baru jika ingin menggantinya.
                        Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </p>

                    @error('gambar')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- BUTTON --}}

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
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>


        {{-- =========================
             FOTO KEGIATAN
        ========================== --}}

        <div class="bg-white rounded-lg shadow p-6">

            <h2 class="text-xl font-bold text-gray-800 mb-2">
                Foto Kegiatan
            </h2>

            <p class="text-gray-500 text-sm mb-6">
                Tambahkan foto kegiatan ekstrakurikuler di sini.
            </p>


            {{-- FORM UPLOAD FOTO --}}

            <form
                action="{{ route('admin.ekstrakurikuler.foto.upload', $ekstrakurikuler->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="mb-8"
            >

                @csrf

                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Pilih Foto Kegiatan
                    </label>

                    <input
                        type="file"
                        name="foto"
                        accept="image/jpeg,image/png,image/webp"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white"
                        required
                    >

                    <p class="text-gray-500 text-sm mt-2">
                        Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </p>

                    @error('foto')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror


                    <button
                        type="submit"
                        class="mt-4 bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg"
                    >
                        <i class="fas fa-upload mr-1"></i>
                        Upload Foto
                    </button>

                </div>

            </form>


            {{-- DAFTAR FOTO --}}

            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                Foto yang Sudah Diunggah
            </h3>


            @if($ekstrakurikuler->fotoKegiatan()->exists())

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                    @foreach($ekstrakurikuler->fotoKegiatan as $foto)

                        <div class="border rounded-lg overflow-hidden bg-gray-50">

                            {{-- FOTO --}}

                            <img
                                src="{{ asset('storage/' . $foto->foto) }}"
                                alt="Foto kegiatan {{ $ekstrakurikuler->nama }}"
                                class="w-full h-40 object-cover"
                            >


                            {{-- TOMBOL HAPUS --}}

                            <div class="p-3">

                                <form
                                    action="{{ route('admin.ekstrakurikuler.foto.hapus', $foto->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg"
                                    >
                                        <i class="fas fa-trash mr-1"></i>
                                        Hapus Foto
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- BELUM ADA FOTO --}}

                <div class="border border-dashed border-gray-300 rounded-lg p-8 text-center">

                    <p class="text-gray-500">
                        Belum ada foto kegiatan.
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
