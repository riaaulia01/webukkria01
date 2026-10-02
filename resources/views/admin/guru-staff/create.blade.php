@extends('layouts.app')

@section('title', 'Tambah Guru & Staff')

@section('content')

<div class="container mx-auto px-4 py-10">

    <div class="max-w-3xl mx-auto">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                Tambah Data Guru & Staff
            </h1>

            <p class="text-gray-500 mt-1">
                Masukkan data guru atau staff baru.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">

            <form action="{{ route('admin.guru-staff.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <!-- NAMA -->
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Nama
                    </label>

                    <input type="text"
                           name="nama"
                           value="{{ old('nama') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3"
                           placeholder="Masukkan nama"
                           required>
                </div>

                <!-- NIP -->
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2">
                        NIP
                    </label>

                    <input type="text"
                           name="nip"
                           value="{{ old('nip') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3"
                           placeholder="Masukkan NIP">
                </div>

                <!-- JABATAN -->
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Jabatan
                    </label>

                    <input type="text"
                           name="jabatan"
                           value="{{ old('jabatan') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3"
                           placeholder="Contoh: Guru Matematika">
                </div>

                <!-- MAPEL -->
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Mata Pelajaran
                    </label>

                    <input type="text"
                           name="mapel"
                           value="{{ old('mapel') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3"
                           placeholder="Contoh: Matematika">
                </div>

                <!-- JENIS -->
                <div class="mb-6">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Jenis
                    </label>

                    <select name="jenis"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                            required>

                        <option value="">-- Pilih Jenis --</option>

                        <option value="Guru"
                            {{ old('jenis') == 'Guru' ? 'selected' : '' }}>
                            Guru
                        </option>

                        <option value="Staff"
                            {{ old('jenis') == 'Staff' ? 'selected' : '' }}>
                            Staff
                        </option>

                    </select>
                </div>

                <!-- FOTO -->
                <div class="mb-6">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Foto
                    </label>

                    <input type="file"
                           name="foto"
                           accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white">

                    <p class="text-sm text-gray-500 mt-2">
                        Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </p>
                </div>

                <!-- TOMBOL -->
                <div class="flex gap-3">

                    <a href="{{ route('admin.guru-staff.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg">
                        Kembali
                    </a>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold">
                        Simpan Data
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection