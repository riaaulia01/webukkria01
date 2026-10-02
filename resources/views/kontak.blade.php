@extends('layouts.app')

@section('title', 'Kontak')

@section('content')

<section class="py-5"><!-- CONTAINER UTAMA -->
<div class="container mx-auto px-4">

    <!-- JUDUL -->
    <div class="w-full flex flex-col items-center text-center mb-10">

        <h2 class="font-bold text-2xl md:text-3xl mb-2">
            Hubungi Kami
        </h2>

        <p class="text-gray-500 mb-0">
            Kami siap membantu pertanyaan Anda
        </p>

    </div>


    <!-- KONTEN KONTAK -->
    <div class="row g-4 justify-content-center">

        <!-- INFORMASI KONTAK -->
        <div class="col-md-6">

            <div class="card shadow-sm border-0 p-4 h-100">

                <h5 class="fw-bold mb-3">
                    Informasi Kontak
                </h5>

                <p>
                    <i class="bi bi-geo-alt-fill text-primary"></i>
                    Jl. Pendidikan No. 10, Bandung, Jawa Barat
                </p>

                <p>
                    <i class="bi bi-telephone-fill text-primary"></i>
                    (022) 1234567
                </p>

                <p>
                    <i class="bi bi-envelope-fill text-primary"></i>
                    info@sman1harapanbangsa.sch.id
                </p>

                <p>
                    <i class="bi bi-clock-fill text-primary"></i>
                    Senin - Jumat, 07.00 - 15.00 WIB
                </p>

                <div class="mt-3">

                    <iframe
                        src="https://www.google.com/maps?q=Bandung&output=embed"
                        width="100%"
                        height="220"
                        style="border:0; border-radius:10px;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>

                </div>

            </div>

        </div>


        <!-- FORM KIRIM PESAN -->
        <div class="col-md-6">

            <div class="card shadow-sm border-0 p-4 h-100">

                <h5 class="fw-bold mb-3">
                    Kirim Pesan
                </h5>

                <form>

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="Masukkan nama Anda"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            placeholder="Masukkan email Anda"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Pesan
                        </label>

                        <textarea
                            class="form-control"
                            rows="4"
                            placeholder="Tulis pesan Anda"></textarea>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        <i class="bi bi-send"></i>
                        Kirim Pesan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</section>@endsection