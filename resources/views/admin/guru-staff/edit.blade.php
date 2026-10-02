@extends('layouts.app')

@section('title', 'Edit Guru & Staff')

@section('content')

<div class="container mx-auto px-4 py-10">

    <div class="max-w-3xl mx-auto">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                Edit Data Guru & Staff
            </h1>

            <p class="text-gray-500 mt-1">
                Ubah data guru atau staff.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">

            <form action="{{ route('admin.guru-staff.update', $guru->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- NAMA -->
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Nama
                    </label>

                    <input type="text"
                           name="nama"
                           value="{{ $guru->nama }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3"
                           required>
                </div>

                <!-- NIP -->
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2">
                        NIP
                    </label>

                    <input type="text"
                           name="nip"
                           value="{{ $guru->nip }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3">
                </div>

                <!-- JABATAN -->
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Jabatan
                    </label>

                    <input type="text"
                           name="jabatan"
                           value="{{ $guru->jabatan }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3">
                </div>

                <!-- MAPEL -->
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Mata Pelajaran
                    </label>

                    <input type="text"
                           name="mapel"
                           value="{{ $guru->mapel }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3">
                </div>

                <!-- JENIS -->
                <div class="mb-6">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Jenis
                    </label>

                    <select name="jenis"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3"
                            required>

                        <option value="Guru"
                            {{ $guru->jenis == 'Guru' ? 'selected' : '' }}>
                            Guru
                        </option>

                        <option value="Staff"
                            {{ $guru->jenis == 'Staff' ? 'selected' : '' }}>
                            Staff
                        </option>

                    </select>
                </div>

                <!-- FOTO -->
                <div class="mb-6">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Foto
                    </label>

                    @if($guru->foto)
                        <div class="mb-4">
                            <p class="text-sm text-gray-500 mb-2">
                                Foto saat ini:
                            </p>

                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                 alt="Foto {{ $guru->nama }}"
                                 class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                        </div>
                    @endif

                    <input type="file"
                           name="foto"
                           accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white">

                    <p class="text-sm text-gray-500 mt-2">
                        Kosongkan jika tidak ingin mengganti foto.
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
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection