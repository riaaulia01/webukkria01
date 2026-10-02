@extends('layouts.app')

@section('title', 'Data Jurusan')

@section('content')

<div class="container mx-auto px-4 py-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Data Jurusan
            </h1>

            <p class="text-gray-600 mt-1">
                Kelola data jurusan sekolah
            </p>
        </div>

        <a href="{{ route('admin.jurusan.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

            <i class="fas fa-plus"></i>
            Tambah Jurusan

        </a>

    </div>


    <!-- PESAN SUKSES -->
    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-5">
            {{ session('success') }}
        </div>

    @endif


    <!-- TABEL -->
    <div class="bg-white rounded-lg shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-blue-600 text-white">

                    <tr>

                        <th class="px-4 py-3 text-left">
                            No
                        </th>

                        <th class="px-4 py-3 text-center">
                            Logo
                        </th>

                        <th class="px-4 py-3 text-left">
                            Nama Jurusan
                        </th>

                        <th class="px-4 py-3 text-left">
                            Kode
                        </th>

                        <th class="px-4 py-3 text-left">
                            Deskripsi
                        </th>

                        <th class="px-4 py-3 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($jurusans as $jurusan)

                        <tr class="border-b hover:bg-gray-50">

                            <!-- NO -->
                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>


                            <!-- LOGO -->
                            <td class="px-4 py-3 text-center">

                                @if($jurusan->gambar)

                                    <img src="{{ asset('storage/' . $jurusan->gambar) }}"
                                         alt="Logo {{ $jurusan->nama_jurusan }}"
                                         class="w-16 h-16 object-contain mx-auto rounded-lg">

                                @else

                                    <span class="text-gray-400 text-sm">
                                        Tidak ada logo
                                    </span>

                                @endif

                            </td>


                            <!-- NAMA -->
                            <td class="px-4 py-3 font-semibold">
                                {{ $jurusan->nama_jurusan }}
                            </td>


                            <!-- KODE -->
                            <td class="px-4 py-3">
                                {{ $jurusan->kode ?? '-' }}
                            </td>


                            <!-- DESKRIPSI -->
                            <td class="px-4 py-3">
                                {{ $jurusan->deskripsi ?? '-' }}
                            </td>


                            <!-- AKSI -->
                            <td class="px-4 py-3 text-center">

                                <div class="flex justify-center gap-2">

                                    <!-- EDIT -->
                                    <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">

                                        <i class="fas fa-edit"></i>

                                    </a>


                                    <!-- HAPUS -->
                                    <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="6"
                                class="px-4 py-8 text-center text-gray-500">

                                Belum ada data jurusan.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection