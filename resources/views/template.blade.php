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
    </style>
</head>
<body>

   {{-- Navbar Atas: Logo + Telepon & Email --}}
    <nav class="navbar navbar-expand-sm bg-light fixed-top">
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
                        <div style="font-size:1.2rem; font-weight:bold;">+62 22 6123806</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="rounded-circle d-flex justify-content-center align-items-center icon-circle">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <div>
                        <div style="font-size:1rem; color:gray;">Alamat Email</div>
                        <div style="font-size:1.2rem; font-weight:bold;">info@sman9bdg.sch.id</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    {{-- Navbar Menu --}}
    <nav class="navbar navbar-expand-sm py-3 fixed-top" style="background-color:#001f3f; top:80px; z-index:1040;">
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

    {{-- Script --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
