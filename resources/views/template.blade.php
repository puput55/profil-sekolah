<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profil Sekolah')</title>

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 70px;
        }

        .navbar.container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        .navbar-dark .dropdown-menu {
            background-color: #001f3f;
        }

        .navbar-dark .dropdown-item {
            color: white;
        }

        .navbar-dark .dropdown-item:hover {
            background-color: #ff9800;
            color: white;
        }

        .icon-circle {
            background-color:#001f3f;
            color:#fff;
            width:40px;
            height:40px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .icon-circle:hover {
            background-color:#ff9800;
            color:#fff;
        }

        /* Warna menu aktif */
        .nav-link.active {
            background-color: #ff9800 !important;
            color: #fff !important;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    {{-- Navbar Atas --}}
    <nav class="navbar navbar-expand-lg bg-light fixed-top" style="padding-top:10px; padding-bottom:10px;">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('storage/asset/image/logo.jpeg') }}" alt="Logo"
                     style="width:60px; height:auto;" class="rounded-pill me-2">
                <span style="color:#001f3f; font-size:1.4rem; font-family:Georgia, serif; font-weight:bold;">
                    SMA TIRTA XSHAVIERUS
                </span>
            </a>

            <div class="d-flex flex-column flex-md-row gap-3 align-items-start align-items-md-center text-start">
                <div class="d-flex align-items-center gap-2">
                    <span class="rounded-circle d-flex justify-content-center align-items-center icon-circle">
                        <i class="fas fa-phone"></i>
                    </span>
                    <div>
                        <div class="text-muted small small-md" style="font-size:0.9rem;">Telepon</div>
                        <div class="fw-bold" style="font-size:1rem;">031 21001716</div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <span class="rounded-circle d-flex justify-content-center align-items-center icon-circle">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <div>
                        <div class="text-muted" style="font-size:0.9rem;">Alamat Email</div>
                        <div class="fw-bold" style="font-size:1rem;">info@smaxshavierus.sch.id</div>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    {{-- Navbar Menu Utama --}}
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#001f3f; top:70px; z-index:1040; position:sticky;">
        <div class="container-fluid">
            <!-- Toggle Button untuk menu utama -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Beranda -->
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'text-warning' : 'text-white' }}" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <!-- Profil Sekolah -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle
                            @if(Route::is('guru') || Route::is('siswa') || Route::is('ps')) text-warning @else text-white @endif"
                            href="#" role="button" data-bs-toggle="dropdown">
                            Profil Sekolah
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('guru') }}">Guru</a></li>
                            <li><a class="dropdown-item" href="{{ route('siswa') }}">Siswa</a></li>
                            <li><a class="dropdown-item" href="{{ route('ps') }}">Tentang Kami</a></li>
                        </ul>
                    </li>

                    <!-- Berita -->
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('berita') ? 'text-warning' : 'text-white' }}" href="{{ route('berita') }}">
                            Berita
                        </a>
                    </li>

                    <!-- Galeri -->
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('galeri') ? 'text-warning' : 'text-white' }}" href="{{ route('galeri') }}">
                            Galeri
                        </a>
                    </li>

                    <!-- Ekstrakurikuler -->
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('ekskul') ? 'text-warning' : 'text-white' }}" href="{{ route('ekskul') }}">
                            Ekstrakurikuler
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten --}}
    @yield('content')

    {{-- FOOTER --}}
    <footer class="container-fluid p-5 m-0" style="background-color: #e8eaec" data-aos="fade-up">
        <div class="row">
            <nav class="navbar navbar-expand-sm bg-light-grey">
                <div class="container-fluid">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <img src="{{ asset('storage/asset/image/logo.jpeg') }}" alt="Logo"
                             style="width:60px; height:auto;" class="rounded-pill me-2">
                        <span style="color:#001f3f; font-size:1.5rem; font-family:Georgia, serif; font-weight:bold;">
                            SMA TIRTA XSHAVIERUS
                        </span>
                    </a>
                </div>
            </nav>

            <div class="col-md-4 mb-4">
                <p class="mt-3" style="color: #001f3f;">Chelsea Widya, Tirta raya<br>Indonesia, 60213</p>
                <p class="mt-3" style="color: #001f3f;">Telepon : 031 21001716</p>
            </div>

            <div class="col-md-3 mb-3">
                <h4 style="color: #001f3f;">Jelajahi</h4>
                <ul class="list-unstyled">
                    <li><a href="{{route('ps')}}" class="text-decoration-none" style="color:#001f3f;">Tentang Kami</a></li>
                    <li><a href="{{route('galeri')}}" class="text-decoration-none" style="color:#001f3f;">Galeri</a></li>
                    <li><a href="{{route('guru')}}" class="text-decoration-none" style="color:#001f3f;">Staf Pengajar</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-3">
                <h4 style="color: #001f3f;">Tautan Cepat</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ route('informasi') }}" class="text-decoration-none" style="color:#001f3f;">Informasi Sekolah</a></li>
                    <li><a href="{{route('home')}}" class="text-decoration-none" style="color:#001f3f;">Hubungi Kami</a></li>
                </ul>
            </div>

            <div class="col-md-2 mb-3">
                <h4 style="color: #001f3f">Jam Kerja</h4>
                <ul class="list-unstyled">
                    <li>Senin-Jumat</li>
                    <li>06.30-15.30</li>
                </ul>
                <div class="d-flex gap-4 mt-3">
                    <a href="https://www.instagram.com/officialsmkypc" style="color: #001f3f"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/share/1YvLXJoehn/" style="color: #001f3f" ><i class="fa-brands fa-facebook"></i></a>
                    <a href="http://www.youtube.com/@smkypctasikmalaya" style="color: #001f3f"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p class="mb-0">Copyright © 2025 SMA Xshavierus. All Right Reserved.</p>
        </div>
    </footer>

    {{-- Script --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
