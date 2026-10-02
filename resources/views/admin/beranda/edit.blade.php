@extends('layouts.app')

@section('title', 'Edit Beranda - Admin')

@section('content')

<section class="max-w-4xl mx-auto px-4 py-12"><div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">
        Edit Beranda
    </h1>

    <p class="text-gray-500 mt-2">
        Ubah informasi yang tampil pada halaman beranda website.
    </p>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-md p-6">

    <form action="{{ route('admin.beranda.update') }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Judul Beranda
            </label>

            <input
                type="text"
                name="judul"
                value="{{ old('judul', $beranda->judul) }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-3"
                required
            >

            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Deskripsi Beranda
            </label>

            <textarea
                name="deskripsi"
                rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-3"
                required
            >{{ old('deskripsi', $beranda->deskripsi) }}</textarea>

            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Judul Bagian Bawah
            </label>

            <input
                type="text"
                name="judul_cta"
                value="{{ old('judul_cta', $beranda->judul_cta) }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-3"
                required
            >

            @error('judul_cta')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Deskripsi Bagian Bawah
            </label>

            <textarea
                name="deskripsi_cta"
                rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-3"
                required
            >{{ old('deskripsi_cta', $beranda->deskripsi_cta) }}</textarea>

            @error('deskripsi_cta')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">

            <button
                type="submit"
                class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-6 py-3 rounded-lg"
            >
                <i class="fa-solid fa-save mr-1"></i>
                Simpan Perubahan
            </button>

            <a
                href="{{ route('admin.dashboard') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-3 rounded-lg"
            >
                Kembali
            </a>

        </div>

    </form>

</div>

</section>@endsection