@extends('layouts.app')

@section('title', 'Pendaftar Jurusan - Admin')

@section('content')

<section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-10">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-3xl font-bold">
            Pendaftar Jurusan
        </h1>    <p class="text-blue-100 mt-2">
        Daftar calon siswa yang telah mendaftar melalui website.
    </p>
</div>

</section><section class="py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-800">
                Data Pendaftar
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-gray-100">
                    <tr>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            No
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Nama Lengkap
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Asal SMP/MTs
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            NISN
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            No. WhatsApp
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Pilihan Jurusan
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Aksi
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($pendaftarans as $index => $pendaftaran)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $pendaftaran->nama_lengkap }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $pendaftaran->asal_sekolah }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $pendaftaran->nisn }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $pendaftaran->no_whatsapp }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $pendaftaran->pilihan_jurusan }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $pendaftaran->created_at->format('d-m-Y') }}
                            </td>

                            <td class="px-6 py-4">

                                <form
                                    action="{{ route('admin.pendaftaran-jurusan.destroy', $pendaftaran->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data pendaftar ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm font-semibold"
                                    >
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="px-6 py-10 text-center text-gray-500">
                                Belum ada pendaftar jurusan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</section>@endsection