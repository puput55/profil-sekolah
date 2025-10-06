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
            padding-top: 150px; /* biar konten tidak ketiban navbar */
        }
        .navbar {
            z-index: 1050;
        }
        .contact-info span {
            font-size: 0.9rem;
        }
        /* Hover efek untuk ikon */
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
        .navbar{
            margin-bottom: 0 !important;
        }
    </style>
</head>
<body>

   {{-- Navbar Atas: Logo + Telepon & Email --}}
    <nav class="navbar navbar-expand-sm bg-light fixed-top mb-0">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            {{-- Logo Sekolah --}}
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('storage/asset/image/sma.png') }}" alt="Logo"
                    style="width:60px; height:auto;" class="rounded-pill me-2">
                <span style="color:#001f3f; font-size:1.4rem; font-family:Georgia, serif; font-weight:bold;">
                    SMA TIRTA XSHAVIERUS
                </span>
            </a>

            {{-- Telepon & Email --}}
            <div class="d-flex gap-4 align-items-center text-start" style="color:#001f3f;">
                <div class="d-flex align-items-center gap-2">
                    <span class="rounded-circle d-flex justify-content-center align-items-center icon-circle">
                        <i class="fas fa-phone"></i>
                    </span>
                    <div>
                        <div style="font-size:1rem; color:gray;">Telepon</div>
                        <div style="font-size:1.2rem; font-weight:bold;">031 21001716</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="rounded-circle d-flex justify-content-center align-items-center icon-circle">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <div>
                        <div style="font-size:1rem; color:gray;">Alamat Email</div>
                        <div style="font-size:1.2rem; font-weight:bold;">info@smaxshavierus.sch.id</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    {{-- Navbar Menu --}}
    <nav class="navbar navbar-expand-sm py-3 fixed-top mt-0" style="background-color:#001f3f; top:70px; z-index:1040;">
        <div class="container-fluid">
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-light" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li><a class="nav-link text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                            Profil Sekolah
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('guru') }}">Guru</a></li>
                            <li><a class="dropdown-item" href="{{ route('ps') }}">Tentang Kami</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link text-white" href="{{ route('berita') }}">Berita</a></li>
                    <li><a class="nav-link text-white" href="{{ route('galeri') }}">Galeri</a></li>
                    <li><a class="nav-link text-white" href="{{ route('ekskul') }}">Ekstrakurikuler</a></li>
                </ul>

                {{-- Login di pojok kanan --}}
                <ul class="navbar-nav ms-auto">
                    <li>
                        <a class="nav-link text-white fw-bold" href="{{ route('login') }}">
                            <i class="fas fa-user me-1"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten --}}
    @yield('content')

    {{-- ==================== FOOTER ==================== --}}
<footer class="container-fluid p-5 m-0" style="background-color: #e8eaec" data-aos="fade-up">
    <div class="row">
        {{-- Logo & Nama Sekolah --}}
        <nav class="navbar navbar-expand-sm bg-light-grey">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('storage/asset/image/sma.png') }}" alt="Logo"
                         style="width:60px; height:auto;" class="rounded-pill me-2">
                    <span style="color:#001f3f; font-size:1.5rem; font-family:Georgia, serif; font-weight:bold;">
                        SMA TIRTA XSHAVIERUS
                    </span>
                </a>
            </div>
        </nav>

        {{-- Alamat --}}
        <div class="col-md-4 mb-4">
            <p class="mt-3" style="color: #001f3f;">Chelsea Widya, Tirta raya<br>Indonesia, 60213</p>
            <p class="mt-3" style="color: #001f3f;">Telepon : 031 21001716</p>
        </div>

        {{-- Navigasi --}}
        <div class="col-md-3 mb-3">
            <h4 style="color: #001f3f;">Jelajahi</h4>
            <ul class="list-unstyled">
                <li><a href="{{route('ps')}}" class="text-decoration-none" style="color:#001f3f;">Tentang Kami</a></li>
                <li><a href="{{route('galeri')}}" class="text-decoration-none" style="color:#001f3f;">Galeri</a></li>
                <li><a href="{{route('guru')}}" class="text-decoration-none" style="color:#001f3f;">Staf Pengajar</a></li>
            </ul>
        </div>

        {{-- Tautan Cepat --}}
        <div class="col-md-3 mb-3">
            <h4 style="color: #001f3f;">Tautan Cepat</h4>
            <ul class="list-unstyled">
                <li><a href="{{ route('informasi') }}" class="text-decoration-none" style="color:#001f3f;">Informasi Sekolah</a></li>
                <li><a href="{{route('home')}}" class="text-decoration-none" style="color:#001f3f;">Hubungi Kami</a></li>
            </ul>
        </div>

        {{-- Jam Kerja + Sosmed --}}
        <div class="col-md-2 mb-3">
            <h4 style="color: #001f3f">Jam Kerja</h4>
            <ul class="list-unstyled">
                <li>Senin-Jumat</li>
                <li>06.30-15.30</li>
            </ul>
            <div class="d-flex gap-4 mt-3">
                <a href="https://www.instagram.com/officialsmkypc?utm_source=ig_web_button_share_sheet&igsh=bnZxMjNycDI4bXhy" style="color: #001f3f"><i class="fa-brands fa-instagram"></i></a>
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
