<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template-Admin</title>

    {{-- <!-- Bootstrap CSS --> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    {{-- sidebar --}}
        <style>
            body {
                margin: 0;
            }

            .wrapper{
                display: flex;
            }

            .sidebar{
                width: 250px;
                height: 100vh;
                background-color: #001f3f;
                color: white;
                padding-top: 20px;
                position: fixed;
                top: 0;
                left: 0;
            }

            .sidebar a{
                display: block;
                color: white;
                padding: 12px 20px;
                text-decoration: none;
            }

            .sidebar a:hover{
                background-color: #575757;
            }

            .content{
                margin-left: 250px;
                padding: 20px;
            }
        </style>

        <div class="sidebar">
            <h2 class="text-center">{{ Auth::user()->role }}</h2>
            <a href="{{ route('Admin.dashboard') }}">Dashboard</a>

            {{-- Menu khusus Admin --}}
            @if(Auth::user()->role == 'Admin')
                <a href="{{ route('Admin.user.index') }}">User</a>
                <a href="{{ route('Admin.guru.index') }}">Guru</a>
                @endif

                {{-- Menu umum (Admin & Operator bisa lihat) --}}
            <a href="{{ route('Admin.siswa.index') }}">Siswa</a>
            <a href="{{ route('Admin.berita.index') }}">Berita</a>
            <a href="{{ route('Admin.ps.index') }}">Profil Sekolah</a>
            <a href="{{ route('Admin.galeri.index') }}">Galeri</a>
            <a href="{{ route('Admin.ekskul.index') }}">Ekstrakulikuler</a>

            <a href="{{ route('login') }}">Logout</a>
        </div>


    {{-- Logo --}}
<div class="content">
    <nav>
        <img src="{{ asset('storage/asset/image/sma.png') }}"alt="Logo"style="width:60px; height:auto;"class="rounded-pill me-2">
        <span style="color:#001f3f; font-size:1.5rem; font-family:Georgia, serif; font-weight:bold;">SMA TIRTA XSHAVIERUS</span>
    </nav>

    @yield('content')
</div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
