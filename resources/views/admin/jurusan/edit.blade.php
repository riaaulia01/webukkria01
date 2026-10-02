@extends('layouts.app')

@section('title', 'Edit Jurusan')

@section('content')

<div class="container mx-auto px-4 py-8">

    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Edit Jurusan
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
            action="{{ route('admin.jurusan.update', $jurusan->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Nama Jurusan
                </label>

                <input
                    type="text"
                    name="nama_jurusan"
                    value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                    required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('nama_jurusan')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Kode Jurusan
                </label>

                <input
                    type="text"
                    name="kode"
                    value="{{ old('kode', $jurusan->kode) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('kode')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>

                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Gambar Jurusan
                </label>

                @if($jurusan->gambar)

                    <div class="mb-4">

                        <p class="text-sm text-gray-500 mb-2">
                            Gambar saat ini:
                        </p>

                        <img
                            src="{{ asset('storage/' . $jurusan->gambar) }}"
                            alt="{{ $jurusan->nama_jurusan }}"
                            class="w-40 h-40 object-cover rounded-lg border"
                        >

                    </div>

                @endif

                <input
                    type="file"
                    name="gambar"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                <p class="text-sm text-gray-500 mt-2">
                    Pilih foto baru dari HP/laptop jika ingin mengganti gambar.
                </p>

                @error('gambar')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

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
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

@endsection