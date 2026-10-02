@extends('layouts.app')

@section('title', 'Guru & Staff')

@section('content')

<section class="py-5">
    <div class="container" style="max-width: 1100px; margin: 0 auto;">

        <!-- Judul -->
        <h2 class="fw-bold text-center mb-2">
            Guru &amp; Staff
        </h2>

        <p class="text-center text-muted mb-5">
            Tenaga pendidik dan kependidikan yang profesional
        </p>


        <!-- ========================= -->
        <!-- TAB NAVIGASI -->
        <!-- ========================= -->

        <div class="text-center mb-4">

            <button
                onclick="showTab('guru')"
                id="btn-guru"
                style="
                    padding: 10px 25px;
                    border: none;
                    border-radius: 8px;
                    background: #0d6efd;
                    color: white;
                    margin-right: 5px;
                    cursor: pointer;
                ">
                👨‍🏫 Guru
            </button>

            <button
                onclick="showTab('staff')"
                id="btn-staff"
                style="
                    padding: 10px 25px;
                    border: none;
                    border-radius: 8px;
                    background: #6c757d;
                    color: white;
                    cursor: pointer;
                ">
                👨‍💼 Staff
            </button>

        </div>


        <!-- ========================= -->
        <!-- BAGIAN GURU -->
        <!-- ========================= -->

        <div id="tab-guru">

            <div style="
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 20px;
            ">

                @forelse($gurus as $guru)

                <div style="
                    background: white;
                    border-radius: 12px;
                    padding: 15px;
                    text-align: center;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
                ">

                    <img
                        src="{{ $guru->foto ? asset('storage/'.$guru->foto) : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                        style="
                            width: 110px;
                            height: 110px;
                            object-fit: cover;
                            border-radius: 50%;
                            display: block;
                            margin: 10px auto 15px;
                        "
                    >

                    <h6 style="
                        font-weight: bold;
                        margin-bottom: 5px;
                    ">
                        {{ $guru->nama }}
                    </h6>

                    <p style="
                        color: #6c757d;
                        font-size: 14px;
                        margin-bottom: 5px;
                    ">
                        {{ $guru->jabatan }}
                    </p>

                    @if($guru->mapel && $guru->mapel != '-')

                    <span style="
                        display: inline-block;
                        background: #0d6efd;
                        color: white;
                        padding: 4px 10px;
                        border-radius: 20px;
                        font-size: 12px;
                    ">
                        {{ $guru->mapel }}
                    </span>

                    @endif

                </div>

                @empty

                <p style="
                    text-align: center;
                    color: #6c757d;
                    grid-column: 1 / -1;
                ">
                    Belum ada data guru.
                </p>

                @endforelse

            </div>

        </div>


        <!-- ========================= -->
        <!-- BAGIAN STAFF -->
        <!-- ========================= -->

        <div id="tab-staff" style="display: none;">

            <div style="
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 20px;
            ">

                @forelse($staffs as $staff)

                <div style="
                    background: white;
                    border-radius: 12px;
                    padding: 15px;
                    text-align: center;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
                ">

                    <img
                        src="{{ $staff->foto ? asset('storage/'.$staff->foto) : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                        style="
                            width: 110px;
                            height: 110px;
                            object-fit: cover;
                            border-radius: 50%;
                            display: block;
                            margin: 10px auto 15px;
                        "
                    >

                    <h6 style="
                        font-weight: bold;
                        margin-bottom: 5px;
                    ">
                        {{ $staff->nama }}
                    </h6>

                    <p style="
                        color: #6c757d;
                        font-size: 14px;
                        margin-bottom: 5px;
                    ">
                        {{ $staff->jabatan }}
                    </p>

                </div>

                @empty

                <p style="
                    text-align: center;
                    color: #6c757d;
                    grid-column: 1 / -1;
                ">
                    Belum ada data staff.
                </p>

                @endforelse

            </div>

        </div>

    </div>
</section>


<!-- ========================= -->
<!-- RESPONSIVE -->
<!-- ========================= -->

<style>

    /* HP */
    @media (max-width: 767px) {

        #tab-guru > div,
        #tab-staff > div {
            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        }

    }

</style>


<!-- ========================= -->
<!-- SCRIPT TAB -->
<!-- ========================= -->

<script>

function showTab(tab) {

    const guru = document.getElementById('tab-guru');
    const staff = document.getElementById('tab-staff');

    const btnGuru = document.getElementById('btn-guru');
    const btnStaff = document.getElementById('btn-staff');

    if (tab === 'guru') {

        guru.style.display = 'block';
        staff.style.display = 'none';

        btnGuru.style.background = '#0d6efd';
        btnStaff.style.background = '#6c757d';

    } else {

        guru.style.display = 'none';
        staff.style.display = 'block';

        btnGuru.style.background = '#6c757d';
        btnStaff.style.background = '#0d6efd';

    }

}

</script>

@endsection