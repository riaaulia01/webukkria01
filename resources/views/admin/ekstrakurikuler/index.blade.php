@extends('layouts.app')

@section('title', 'Data Ekstrakurikuler')

@section('content')

<div class="container mx-auto px-4 py-8">

    {{-- =========================
         HEADER
    ========================== --}}

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Data Ekstrakurikuler
            </h1>

            <p class="text-gray-600 mt-1">
                Kelola data ekstrakurikuler sekolah
            </p>
        </div>

        <a
            href="{{ route('admin.ekstrakurikuler.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg"
        >
            <i class="fas fa-plus mr-1"></i>
            Tambah Ekstrakurikuler
        </a>

    </div>


    {{-- =========================
         PESAN SUKSES
    ========================== --}}

    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-5">
            {{ session('success') }}
        </div>

    @endif


    {{-- =========================
         TABEL
    ========================== --}}

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-blue-600 text-white">

                    <tr>

                        <th class="px-4 py-3 text-left">
                            No
                        </th>

                        <th class="px-4 py-3 text-left">
                            Logo
                        </th>

                        <th class="px-4 py-3 text-left">
                            Nama Ekstrakurikuler
                        </th>

                        <th class="px-4 py-3 text-left">
                            Pembina
                        </th>

                        <th class="px-4 py-3 text-left">
                            Jadwal
                        </th>

                        <th class="px-4 py-3 text-center">
                            Foto Kegiatan
                        </th>

                        <th class="px-4 py-3 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($ekstrakurikulers as $ekskul)

                        <tr class="border-b hover:bg-gray-50">

                            {{-- NO --}}

                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>


                            {{-- LOGO --}}

                            <td class="px-4 py-3">

                                @if($ekskul->gambar)

                                    <img
                                        src="{{ asset('storage/' . $ekskul->gambar) }}"
                                        alt="Logo {{ $ekskul->nama }}"
                                        class="w-16 h-16 object-cover rounded-lg border"
                                    >

                                @else

                                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">

                                        <i class="fas fa-image text-gray-400 text-xl"></i>

                                    </div>

                                @endif

                            </td>


                            {{-- NAMA --}}

                            <td class="px-4 py-3 font-semibold">

                                {{ $ekskul->nama }}

                            </td>


                            {{-- PEMBINA --}}

                            <td class="px-4 py-3">

                                {{ $ekskul->pembina ?? '-' }}

                            </td>


                            {{-- JADWAL --}}

                            <td class="px-4 py-3">

                                {{ $ekskul->jadwal ?? '-' }}

                            </td>


                            {{-- FOTO KEGIATAN --}}

                            <td class="px-4 py-3 text-center">

                                <div class="flex flex-col items-center gap-2">

                                    @if($ekskul->fotoKegiatan()->count() > 0)

                                        <span class="text-sm text-green-600 font-semibold">

                                            <i class="fas fa-images mr-1"></i>

                                            {{ $ekskul->fotoKegiatan()->count() }}
                                            foto

                                        </span>

                                    @else

                                        <span class="text-sm text-gray-400">

                                            Belum ada foto

                                        </span>

                                    @endif


                                    <a
                                        href="{{ route('admin.ekstrakurikuler.edit', $ekskul->id) }}"
                                        class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded text-sm"
                                    >

                                        <i class="fas fa-camera mr-1"></i>

                                        Kelola Foto

                                    </a>

                                </div>

                            </td>


                            {{-- AKSI --}}

                            <td class="px-4 py-3 text-center">

                                <div class="flex justify-center gap-2">

                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('admin.ekstrakurikuler.edit', $ekskul->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded"
                                        title="Edit"
                                    >

                                        <i class="fas fa-edit"></i>

                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ route('admin.ekstrakurikuler.destroy', $ekskul->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded"
                                            title="Hapus"
                                        >

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="px-4 py-8 text-center text-gray-500"
                            >

                                <i class="fas fa-folder-open text-3xl mb-2"></i>

                                <p>
                                    Belum ada data ekstrakurikuler.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
