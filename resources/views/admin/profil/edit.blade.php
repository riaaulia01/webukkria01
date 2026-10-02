@extends('layouts.app')

@section('title', 'Edit Profil Sekolah - Admin')

@section('content')

<section class="max-w-5xl mx-auto px-4 py-12">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Edit Profil Sekolah
        </h1>

        <p class="text-gray-500 mt-2">
            Ubah informasi profil sekolah yang tampil pada website.
        </p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-6">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-md p-6">

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Nama Sekolah -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Sekolah
                    </label>

                    <input
                        type="text"
                        name="nama_sekolah"
                        value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                    >
                </div>

                <!-- NPSN -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        NPSN
                    </label>

                    <input
                        type="text"
                        name="npsn"
                        value="{{ old('npsn', $profil->npsn) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                    >
                </div>

                <!-- Akreditasi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Akreditasi
                    </label>

                    <input
                        type="text"
                        name="akreditasi"
                        value="{{ old('akreditasi', $profil->akreditasi) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                    >
                </div>

                <!-- Telepon -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Telepon
                    </label>

                    <input
                        type="text"
                        name="telepon"
                        value="{{ old('telepon', $profil->telepon) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                    >
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $profil->email) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                    >
                </div>

                <!-- Website -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Website
                    </label>

                    <input
                        type="text"
                        name="website"
                        value="{{ old('website', $profil->website) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >
                </div>

                <!-- Kepala Sekolah -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kepala Sekolah
                    </label>

                    <input
                        type="text"
                        name="kepala_sekolah"
                        value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                    >
                </div>

                <!-- Foto Kepala Sekolah -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Foto Kepala Sekolah
                    </label>

                    @if($profil->foto_kepala_sekolah)
                        <div class="mb-3">
                            <img
                                src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                                alt="Foto Kepala Sekolah"
                                class="w-32 h-32 object-cover rounded-lg border border-gray-300"
                            >
                        </div>
                    @endif

                    <input
                        type="file"
                        name="foto_kepala_sekolah"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white"
                    >

                    <p class="text-xs text-gray-500 mt-2">
                        JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </p>
                </div>

                <!-- Tahun Berdiri -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tahun Berdiri
                    </label>

                    <input
                        type="text"
                        name="tahun_berdiri"
                        value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                    >
                </div>

                <!-- Jumlah Siswa -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Jumlah Siswa
                    </label>

                    <input
                        type="text"
                        name="jumlah_siswa"
                        value="{{ old('jumlah_siswa', $profil->jumlah_siswa) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                    >
                </div>

            </div>

            <!-- Sambutan Kepala Sekolah -->
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Sambutan Kepala Sekolah
                </label>

                <textarea
                    name="sambutan_kepala_sekolah"
                    rows="6"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    placeholder="Tulis sambutan Kepala Sekolah di sini..."
                >{{ old('sambutan_kepala_sekolah', $profil->sambutan_kepala_sekolah) }}</textarea>
            </div>

            <!-- Alamat -->
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                >{{ old('alamat', $profil->alamat) }}</textarea>
            </div>

            <!-- Visi -->
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Visi
                </label>

                <textarea
                    name="visi"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                >{{ old('visi', $profil->visi) }}</textarea>
            </div>

            <!-- Misi -->
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Misi
                </label>

                <textarea
                    name="misi"
                    rows="5"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                >{{ old('misi', $profil->misi) }}</textarea>
            </div>

            <!-- Deskripsi -->
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi Sekolah
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                >{{ old('deskripsi', $profil->deskripsi) }}</textarea>
            </div>

            <!-- Tombol -->
            <div class="flex gap-3 mt-8">

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

</section>

@endsection