<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template-Admin</title>

    {{-- ==================== BOOTSTRAP & FONT AWESOME ==================== --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Reset margin */
        body {
            margin: 0;
        }

        /* Layout wrapper */
        .wrapper {
            display: flex;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #001f3f;
            color: white;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h2 {
            font-size: 1.3rem;
            font-weight: bold;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        /* Konten utama */
        .content {
            margin-left: 250px; /* Sesuai lebar sidebar */
            padding: 20px;
        }

        /* Logo Navbar atas (opsional bisa diubah ke header tetap) */
        nav img {
            vertical-align: middle;
        }
    </style>
</head>
<body>

    {{-- ==================== SIDEBAR ==================== --}}
    <div class="sidebar">
        {{-- Role User --}}
        <h2 class="text-center">{{ Auth::user()->role }}</h2>

        {{-- Menu umum --}}
        <a href="{{ route('Admin.dashboard') }}"><i class="fa fa-home me-2"></i> Dashboard</a>

        {{-- Menu khusus untuk Admin --}}
        @if(Auth::user()->role == 'Admin')
            <a href="{{ route('Admin.user.index') }}"><i class="fa fa-users me-2"></i> User</a>
            <a href="{{ route('Admin.guru.index') }}"><i class="fa fa-chalkboard-teacher me-2"></i> Guru</a>
        @endif

        {{-- Menu untuk Admin & Operator --}}
        <a href="{{ route('Admin.siswa.index') }}"><i class="fa fa-user-graduate me-2"></i> Siswa</a>
        <a href="{{ route('Admin.berita.index') }}"><i class="fa fa-newspaper me-2"></i> Berita</a>
        <a href="{{ route('Admin.ps.index') }}"><i class="fa fa-school me-2"></i> Profil Sekolah</a>
        <a href="{{ route('Admin.galeri.index') }}"><i class="fa fa-image me-2"></i> Galeri</a>
        <a href="{{ route('Admin.ekskul.index') }}"><i class="fa fa-futbol me-2"></i> Ekstrakurikuler</a>

        {{-- Logout --}}
        <a href="{{ route('login') }}"><i class="fa fa-sign-out-alt me-2"></i> Logout</a>
    </div>

    {{-- ==================== CONTENT ==================== --}}
    <div class="content">
        {{-- Logo Sekolah --}}
        <nav class="mb-3">
            <img src="{{ asset('storage/asset/image/sma.png') }}" alt="Logo"
                 style="width:60px; height:auto;" class="rounded-pill me-2">
            <span style="color:#001f3f; font-size:1.5rem; font-family:Georgia, serif; font-weight:bold;">
                SMA TIRTA XSHAVIERUS
            </span>
        </nav>

        {{-- Yield untuk isi halaman --}}
        @yield('content')
    </div>

    {{-- ==================== BOOTSTRAP JS ==================== --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
