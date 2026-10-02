@extends('layouts.app')

@section('title', 'Data Galeri')

@section('content')

<div class="container mx-auto px-4 py-8"><div class="flex justify-between items-center mb-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Data Galeri
        </h1>

        <p class="text-gray-600 mt-1">
            Kelola foto dan galeri sekolah
        </p>
    </div>

    <a href="{{ route('admin.galeri.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

        <i class="fas fa-plus"></i>
        Tambah Galeri

    </a>

</div>

@if(session('success'))

    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-5">
        {{ session('success') }}
    </div>

@endif

<div class="bg-white rounded-lg shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-blue-600 text-white">

                <tr>

                    <th class="px-4 py-3 text-left">No</th>

                    <th class="px-4 py-3 text-left">Judul</th>

                    <th class="px-4 py-3 text-left">Gambar</th>

                    <th class="px-4 py-3 text-left">Kategori</th>

                    <th class="px-4 py-3 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($galeris as $galeri)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            {{ $galeri->judul }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $galeri->gambar }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $galeri->kategori ?? '-' }}
                        </td>

                        <td class="px-4 py-3 text-center">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">

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

                        <td colspan="5"
                            class="px-4 py-8 text-center text-gray-500">

                            Belum ada data galeri.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>@endsection