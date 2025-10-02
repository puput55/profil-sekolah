@extends('template')
@section('content')
<div class="container py-5">

    {{-- Header --}}
    <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold" style="color:#001f3f;">Sambutan Kepala Sekolah</h2>
        <hr class="mx-auto" style="width:80px; border:2px solid #001f3f;">
    </div>

    {{-- Row Foto & Logo --}}
    <div class="row align-items-center mb-5" data-aos="fade-up">
        {{-- Foto Kepala Sekolah --}}
        <div class="col-md-4 text-center mb-4 mb-md-0">
            <img src="{{ asset('asset/image/' . $profil->foto) }}"
                 alt="Foto Kepala Sekolah"
                 class="img-fluid shadow-sm"
                 style="width: 260px; height: auto; object-fit: cover;">
            <h5 class="mt-3 fw-bold">{{ $profil->kepala_sekolah }}</h5>
            <p class="text-muted mb-0">Kepala Sekolah</p>
        </div>

        {{-- Sambutan --}}
        <div class="col-md-5">
            <p style="text-align: justify; line-height:1.8;">
                {{ $profil->deskripsi }}
            </p>
        </div>

        {{-- Logo Sekolah --}}
        <div class="col-md-3 text-center">
            <img src="{{ asset('asset/image/' . $profil->logo) }}"
                 alt="Logo Sekolah"
                 class="img-fluid shadow-sm rounded-circle"
                 style="width: 200px; height: 200px; object-fit: contain; background:#fff; padding:10px;">
            <h5 class="mt-3 fw-bold">{{ $profil->nama_sekolah }}</h5>
            <p class="text-muted">Sejak {{ $profil->tahun_berdiri }}</p>
        </div>
    </div>

    {{-- Informasi Sekolah --}}
    <div class="mt-5" data-aos="fade-up">
        <h4 class="fw-bold mb-4" style="color:#001f3f;">Informasi Sekolah</h4>
        <div class="row g-4">
            {{-- Visi Misi --}}
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3"><i class="fa-solid fa-bullseye text-warning me-2"></i> Visi & Misi</h5>
                        <p style="text-align: justify;">{{ $profil->visi_misi }}</p>
                    </div>
                </div>
            </div>

            {{-- Alamat --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6 class="fw-bold"><i class="fa-solid fa-location-dot text-danger me-2"></i> Alamat</h6>
                        <p>{{ $profil->alamat }}</p>
                    </div>
                </div>
            </div>

            {{-- Kontak --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6 class="fw-bold"><i class="fa-solid fa-phone text-success me-2"></i> Kontak</h6>
                        <p>{{ $profil->kontak }}</p>
                    </div>
                </div>
            </div>

            {{-- Tahun Berdiri --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6 class="fw-bold"><i class="fa-solid fa-calendar-days text-primary me-2"></i> Tahun Berdiri</h6>
                        <p>{{ $profil->tahun_berdiri }}</p>
                    </div>
                </div>
            </div>

            {{-- NPSN --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6 class="fw-bold"><i class="fa-solid fa-id-card text-secondary me-2"></i> NPSN</h6>
                        <p>{{ $profil->npsn }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- footer --}}
<footer class="container-fluid p-5 m-0" style="background-color: #e8eaec" data-aos="fade-up">
    <div class="row">
    <nav class="navbar navbar-expand-sm navbar-light-grey bg-light-grey">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('storage/asset/image/sma.png') }}"alt="Logo"style="width:60px; height:auto;"class="rounded-pill me-2">
        <span style="color:#001f3f; font-size:1.5rem; font-family:Georgia, serif; font-weight:bold;">SMA TIRTA XSHAVIERUS</span>
        </a>
    </div>
    </nav>
    <div class="col-md-4 mb-4">
        <p class="mt-3" style="color: #001f3f; font-size:1.3rem; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight:semi-bold;">Chelsea Widya, Tirta raya<br>
        Indonesia, 60213</p>
        <p class="mt-3" style="color: #001f3f; font-size:1.3rem; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-weight:semi-bold;">Telepon : 031 21001716</p></p>
    </div>
    <div class="col-md-3 mb-3">
        <h4 style="color: #001f3f;">Jelajahi</h4>
        <ul class="list-unstyled">
            <li class="text-dark text-decoration-none">Tentang Kami</li>
            <li class="text-dark text-decoration-none">Fasilitas</li>
            <li class="text-dark text-decoration-none">Aktifitas</li>
            <li class="text-dark text-decoration-none">Kalender Akademik</li>
            <li class="text-dark text-decoration-none">Pendaftaran</li>
        </ul>
    </div>
    <div class="col-md-3 mb-3">
        <h4 style="color: #001f3f;">Tautan Cepat</h4>
        <ul class="list-unstyled">
            <li class="text-dark text-decoration-none">Informasi Sekolah</li>
            <li class="text-dark text-decoration-none">Hubungi Kami</li>
        </ul>
    </div>
    <div class="col-md-2 mb-3">
        <h4 style="color: #001f3f">Jam Kerja</h4>
        <ul class="list-unstyled">
            <li>Senin-Jumat</li>
            <li>06.30-15.30</li>
        </ul>
        <div class="d-flex gap-4 mt-3">
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-youtube"></i>
            <i class="fa-brands fa-linkedin"></i>
        </div>
    </div>
    <hr>
    <div class="text-center">
        <p class="mb-0">Copyright © 2024 Sekolah Ciputra. All Right Reserved.</p>
    </div>
</div>
</footer>
@endsection
