@extends('layouts.app')

@section('title', 'Admin Guru & Staff')

@section('content')

<div class="container mx-auto px-4 py-10"><div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Data Guru & Staff
        </h1>
        <p class="text-gray-500 mt-1">
            Kelola data guru dan staff sekolah
        </p>
    </div>

    <a href="{{ route('admin.guru-staff.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold">
        + Tambah Data
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-md overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">NIP</th>
                    <th class="px-4 py-3 text-left">Jabatan</th>
                    <th class="px-4 py-3 text-left">Mapel</th>
                    <th class="px-4 py-3 text-left">Jenis</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($gurus as $guru)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-4 py-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-4 font-semibold">
                            {{ $guru->nama }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $guru->nip ?? '-' }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $guru->jabatan ?? '-' }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $guru->mapel ?? '-' }}
                        </td>

                        <td class="px-4 py-4">

                            @if($guru->jenis == 'Guru')

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                    Guru
                                </span>

                            @else

                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                    Staff
                                </span>

                            @endif

                        </td>

                        <td class="px-4 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.guru-staff.edit', $guru->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-2 rounded-lg">
                                    Edit
                                </a>

                                <form action="{{ route('admin.guru-staff.destroy', $guru->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center py-10 text-gray-500">
                            Belum ada data Guru atau Staff.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>@endsection