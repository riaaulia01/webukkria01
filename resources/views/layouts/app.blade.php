<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SMK Negeri 1 Cijati')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #facc15;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-blue-800 text-white shadow-lg sticky top-0 z-50">

        <div class="max-w-7xl mx-auto px-4">

            <div class="flex justify-between items-center h-16">

                <!-- NAMA SEKOLAH -->
                <a href="{{ route('home') }}"
                   class="flex items-center gap-2 font-bold text-lg">

                    SMK Negeri 1 Cijati

                </a>


                <!-- MENU DESKTOP -->
                <div class="hidden md:flex gap-6 text-sm font-medium">

                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Beranda
                    </a>

                    <a href="{{ route('profil') }}"
                       class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}">
                        Profil Sekolah
                    </a>

                    <a href="{{ route('jurusan') }}"
                       class="nav-link {{ request()->routeIs('jurusan') ? 'active' : '' }}">
                        Jurusan
                    </a>

                    <a href="{{ route('ekstrakurikuler') }}"
                       class="nav-link {{ request()->routeIs('ekstrakurikuler') ? 'active' : '' }}">
                        Ekstrakurikuler
                    </a>

                    <a href="{{ route('guru-staff') }}"
                       class="nav-link {{ request()->routeIs('guru-staff') ? 'active' : '' }}">
                        Guru & Staff
                    </a>

                    <a href="{{ route('galeri') }}"
                       class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}">
                        Galeri
                    </a>

                    <a href="{{ route('kontak') }}"
                       class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}">
                        Kontak
                    </a>

                </div>


                <!-- TOMBOL MENU MOBILE -->
                <button id="menuBtn"
                        class="md:hidden text-xl">

                    <i class="fa-solid fa-bars"></i>

                </button>

            </div>

        </div>


        <!-- MENU MOBILE -->
        <div id="mobileMenu"
             class="hidden md:hidden bg-blue-900 px-4 pb-4 flex flex-col gap-3 text-sm">

            <a href="{{ route('home') }}"
               class="py-1 border-b border-blue-700">
                Beranda
            </a>

            <a href="{{ route('profil') }}"
               class="py-1 border-b border-blue-700">
                Profil Sekolah
            </a>

            <a href="{{ route('jurusan') }}"
               class="py-1 border-b border-blue-700">
                Jurusan
            </a>

            <a href="{{ route('ekstrakurikuler') }}"
               class="py-1 border-b border-blue-700">
                Ekstrakurikuler
            </a>

            <a href="{{ route('guru-staff') }}"
               class="py-1 border-b border-blue-700">
                Guru & Staff
            </a>

            <a href="{{ route('galeri') }}"
               class="py-1 border-b border-blue-700">
                Galeri
            </a>

            <a href="{{ route('kontak') }}"
               class="py-1">
                Kontak
            </a>

        </div>

    </nav>


    <!-- KONTEN HALAMAN -->
    <main class="fade-in">

        @yield('content')

    </main>


    <!-- FOOTER -->
    <footer class="bg-blue-900 text-white mt-16 py-8">

        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-6 text-sm">

            <!-- SEKOLAH -->
            <div>

                <h3 class="font-bold text-lg mb-2">
                    SMK Negeri 1 Cijati
                </h3>

                <p class="text-gray-300">
                    Mewujudkan generasi cerdas, berkarakter,
                    dan berdaya saing global.
                </p>

            </div>


            <!-- MENU -->
            <div>

                <h3 class="font-bold mb-2">
                    Menu
                </h3>

                <ul class="space-y-1 text-gray-300">

                    <li>
                        <a href="{{ route('profil') }}"
                           class="hover:text-yellow-400">
                            Profil Sekolah
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('jurusan') }}"
                           class="hover:text-yellow-400">
                            Jurusan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kontak') }}"
                           class="hover:text-yellow-400">
                            Kontak
                        </a>
                    </li>

                </ul>

            </div>


            <!-- KONTAK -->
            <div>

                <h3 class="font-bold mb-2">
                    Kontak
                </h3>

                <p class="text-gray-300">
                    <i class="fa-solid fa-location-dot mr-2"></i>
                    Jl. Pendidikan No. 45, Bandung
                </p>

                <p class="text-gray-300">
                    <i class="fa-solid fa-phone mr-2"></i>
                    (022) 1234567
                </p>

            </div>

        </div>


        <!-- COPYRIGHT -->
        <div class="text-center text-gray-400 text-xs mt-6">

            &copy; {{ date('Y') }}
            SMK Negeri 1 Cijati.
            All rights reserved.

        </div>

    </footer>


    <!-- SCRIPT MENU MOBILE -->
    <script>

        document.getElementById('menuBtn').addEventListener('click', function () {

            document.getElementById('mobileMenu')
                .classList.toggle('hidden');

        });

    </script>

</body>

</html>