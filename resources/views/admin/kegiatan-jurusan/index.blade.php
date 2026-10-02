@extends('layouts.app')

@section('title', 'Kegiatan Jurusan - Admin')

@section('content')

<section class="py-10 bg-gray-100 min-h-screen"><div class="max-w-6xl mx-auto px-4">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Kegiatan Jurusan
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola foto kegiatan dari setiap jurusan.
            </p>
        </div>

        <a
            href="{{ route('admin.kegiatan-jurusan.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-3 rounded-lg transition"
        >
            + Tambah Kegiatan
        </a>

    </div>


    <!-- PESAN BERHASIL -->
    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif


    <!-- TABEL -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-blue-600 text-white">

                    <tr>

                        <th class="px-4 py-3 text-left">
                            No
                        </th>

                        <th class="px-4 py-3 text-left">
                            Jurusan
                        </th>

                        <th class="px-4 py-3 text-left">
                            Foto
                        </th>

                        <th class="px-4 py-3 text-left">
                            Judul Kegiatan
                        </th>

                        <th class="px-4 py-3 text-left">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($kegiatan as $item)

                        <tr class="border-b hover:bg-gray-50">

                            <!-- NOMOR -->
                            <td class="px-4 py-4">
                                {{ $loop->iteration }}
                            </td>


                            <!-- JURUSAN -->
                            <td class="px-4 py-4 font-semibold">
                                {{ $item->jurusan->nama_jurusan ?? '-' }}
                            </td>


                            <!-- FOTO -->
                            <td class="px-4 py-4">

                                @if($item->gambar)

                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        class="w-24 h-16 object-cover rounded-lg shadow"
                                    >

                                @else

                                    <span class="text-gray-400">
                                        Tidak ada foto
                                    </span>

                                @endif

                            </td>


                            <!-- JUDUL -->
                            <td class="px-4 py-4">
                                {{ $item->judul }}
                            </td>


                            <!-- AKSI -->
                            <td class="px-4 py-4">

                                <div class="flex gap-2">

                                    <!-- EDIT -->
                                    <a
                                        href="{{ route('admin.kegiatan-jurusan.edit', $item->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm"
                                    >
                                        Edit
                                    </a>


                                    <!-- HAPUS -->
                                    <form
                                        action="{{ route('admin.kegiatan-jurusan.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-4 py-8 text-center text-gray-500"
                            >
                                Belum ada foto kegiatan jurusan.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</section>@endsection