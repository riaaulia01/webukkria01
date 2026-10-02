@extends('layouts.app')

@section('title', 'Pendaftar Ekstrakurikuler - Admin')

@section('content')

<section class="py-10 bg-gray-50 min-h-screen"><div class="max-w-7xl mx-auto px-4">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Pendaftar Ekstrakurikuler
            </h1>

            <p class="text-gray-600 mt-1">
                Daftar siswa yang telah mendaftar ekstrakurikuler.
            </p>
        </div>

        <a
            href="{{ route('admin.dashboard') }}"
            class="inline-flex items-center justify-center gap-2 bg-gray-600 hover:bg-gray-700 text-white px-5 py-3 rounded-lg font-semibold transition"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Dashboard
        </a>

    </div>


    <!-- TABEL -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-blue-700 text-white">

                    <tr>

                        <th class="px-5 py-4 text-left">
                            No
                        </th>

                        <th class="px-5 py-4 text-left">
                            Nama
                        </th>

                        <th class="px-5 py-4 text-left">
                            Kelas
                        </th>

                        <th class="px-5 py-4 text-left">
                            NIS
                        </th>

                        <th class="px-5 py-4 text-left">
                            WhatsApp
                        </th>

                        <th class="px-5 py-4 text-left">
                            Ekstrakurikuler
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-200">

                    @forelse($pendaftaran as $index => $data)

                        <tr class="hover:bg-gray-50">

                            <td class="px-5 py-4 text-gray-700">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-5 py-4 font-semibold text-gray-800">
                                {{ $data->nama }}
                            </td>

                            <td class="px-5 py-4 text-gray-700">
                                {{ $data->kelas }}
                            </td>

                            <td class="px-5 py-4 text-gray-700">
                                {{ $data->nis }}
                            </td>

                            <td class="px-5 py-4 text-gray-700">
                                {{ $data->whatsapp }}
                            </td>

                            <td class="px-5 py-4 text-gray-700">

                                @if($data->ekstrakurikuler)
                                    {{ $data->ekstrakurikuler->nama }}
                                @else
                                    -
                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-5 py-10 text-center text-gray-500"
                            >

                                <i class="fa-solid fa-inbox text-4xl mb-3"></i>

                                <p class="font-semibold">
                                    Belum ada pendaftar ekstrakurikuler.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</section>@endsection