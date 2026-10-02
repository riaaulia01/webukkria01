@extends('layouts.app')

@section('title', 'Daftar Ekstrakurikuler - SMK Negeri 1 Cijati')

@section('content')

<!-- HEADER -->
<section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-14">
    <div class="max-w-7xl mx-auto px-4 text-center">

        <h1 class="text-3xl md:text-4xl font-bold mb-2">
            Pendaftaran Ekstrakurikuler
        </h1>

        <p class="text-blue-100">
            Silakan isi data diri dengan lengkap
        </p>

    </div>
</section>


<!-- FORM -->
<section class="py-12 bg-gray-50">

    <div class="max-w-3xl mx-auto px-4">

        <div class="bg-white rounded-2xl shadow-lg p-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Form Pendaftaran
            </h2>

            <form
                action="{{ route('ekstrakurikuler.daftar.simpan', $ekstrakurikuler->id) }}"
                method="POST"
            >

                @csrf

                <!-- NAMA -->
                <div class="mb-5">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required
                    >

                </div>


                <!-- KELAS -->
                <div class="mb-5">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Kelas
                    </label>

                    <input
                        type="text"
                        name="kelas"
                        placeholder="Contoh: X PPLG 1"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required
                    >

                </div>


                <!-- NIS -->
                <div class="mb-5">

                    <label class="block text-gray-700 font-semibold mb-2">
                        NIS
                    </label>

                    <input
                        type="text"
                        name="nis"
                        placeholder="Masukkan NIS"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required
                    >

                </div>


                <!-- WHATSAPP -->
                <div class="mb-5">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Nomor WhatsApp
                    </label>

                    <input
                        type="tel"
                        name="whatsapp"
                        placeholder="Contoh: 081234567890"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required
                    >

                </div>


                <!-- EKSTRAKURIKULER -->
                <div class="mb-6">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Ekstrakurikuler
                    </label>

                    <input
                        type="text"
                        value="{{ $ekstrakurikuler->nama }}"
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700"
                        readonly
                    >

                </div>


                <!-- TOMBOL -->
                <div class="flex flex-col sm:flex-row gap-3">

                    <button
                        type="submit"
                        class="flex-1 inline-flex justify-center items-center gap-2 bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-lg font-semibold transition"
                    >
                        <i class="fa-solid fa-paper-plane"></i>
                        Kirim Pendaftaran
                    </button>


                    <a
                        href="{{ route('ekstrakurikuler.show', $ekstrakurikuler->id) }}"
                        class="inline-flex justify-center items-center gap-2 bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition"
                    >
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection