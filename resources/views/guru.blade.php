@extends('template')

@section('content')
<div class="container py-5" data-aos="fade-up">
    <h2 class="text-center mb-4" style="color: #001f3f;">Daftar Guru SMA XSHAVIERUS</h2>

    <div class="row justify-content-center">
        @forelse ($guru as $item)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('asset/image/'.$item->foto) }}"
                         class="card-img-top"
                         alt="{{ $item->nama_guru }}"
                         style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1">{{ $item->nama_guru }}</h5>
                        <p class="text-muted mb-1">NIP: {{ $item->nip }}</p>
                        <p class="fw-bold">{{ $item->mapel }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada data guru yang ditampilkan.</p>
            </div>
        @endforelse
    </div>
</div>
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
