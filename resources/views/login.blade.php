<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem SMA XSHAVIERUS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            background: url("{{ asset('storage/asset/image/background.jpeg') }}") no-repeat center center fixed;
            background-size: cover;
        }
        .login-card {
            background: rgba(0, 0, 0, 0.6); /* transparan gelap */
            color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        .login-card img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-4">
            <div class="login-card text-center" data-aos="zoom-in" data-aos-duration="1000">

                <!-- Logo -->
                <img src="{{ asset('storage/asset/image/logo.jpeg') }}"
                     alt="Logo Sekolah"
                     class="rounded-circle bg-white p-2"
                     data-aos="fade-down"
                     data-aos-duration="1200">

                <!-- Nama Sekolah -->
                <h4 class="mb-3" data-aos="fade-up" data-aos-delay="300">SMA XSHAVIERUS</h4>
                <p class="text-white-50" data-aos="fade-up" data-aos-delay="500">Login untuk sistem sekolah</p>

                {{-- Pesan error --}}
                @if(session('error'))
                    <div class="alert alert-danger" data-aos="fade-down">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger" data-aos="fade-down">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Login -->
                <form action="{{ route('login') }}" method="POST" class="mt-3" data-aos="fade-up" data-aos-delay="700">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                               placeholder="Masukkan username" required autofocus>
                    </div>

                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Masukkan password" required>
                    </div>

                    <button type="submit" class="btn btn-warning w-100">Masuk</button>
                    <a href="{{ route('home') }}" class="d-block mt-2 text-decoration-none text-info">Kembali Ke Tampilan Awal</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
