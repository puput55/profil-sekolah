@extends('template')

@section('content')

{{-- ==================== HERO SECTION ==================== --}}
<div class="container-fluid w-100 p-0 m-0" data-aos="fade-up">
    <div class="position-relative text-white"
         style="background-image: url('{{ asset('storage/asset/image/high-school.jpg') }}');
                background-size: cover; background-position: center; height: 100vh;">
        <div class="d-flex flex-column justify-content-center h-100" style="background-color: rgba(0,0,0,0.5);">
            <h1 class="display-4 fw-bold mx-3">Selamat Datang di SMA TIRTA XSHAVIERUS</h1>
            <p class="lead mt-3 mx-3">Sekolah dengan segudang prestasi dan fasilitas terbaik.</p>
            <div class="mt-2 mx-3">
                <a href="#pertanyaan" class="btn text-white" style="background-color: #001f3f">FAQ</a>
            </div>
        </div>
    </div>
</div>

{{-- ==================== SAMBUTAN & STATISTIK ==================== --}}
<div class="container-fluid p-5 m-0" style="background-color: #f1b434;">
    <div class="row justify-content-center mt-4" data-aos="fade-up">
        <div class="card shadow-lg border-0 rounded-4 p-4 d-flex flex-row align-items-center w-100">

            @isset($profil)
                {{-- Foto Kepala Sekolah --}}
                <img src="{{ asset('asset/image/'.$profil->foto) }}" alt="Foto Kepala Sekolah"
                     class="rounded-circle me-4" width="150" height="150">

                {{-- Sambutan --}}
                <div class="flex-grow-1">
                    <h4 class="fw-bold">Sambutan Kepala Sekolah</h4>
                    <h5>{{ $profil->kepala_sekolah }}</h5>
                    <p class="text-muted" style="max-width: 500px;">
                        {{ Str::limit($profil->deskripsi, 200, '...') }}
                    </p>
                    <a href="{{ route('ps') }}" class="btn btn-primary">Selengkapnya →</a>
                </div>

                {{-- Statistik --}}
                <div class="ms-5 text-center">
                    <h4 class="fw-bold">Statistik Data Sekolah</h4>
                    <div class="d-flex justify-content-around mt-3">
                        <div class="mx-3">
                            <h3>{{ $jumlahGuru }}</h3>
                            <p class="text-muted">Guru & Staf</p>
                        </div>
                        <div class="mx-3">
                            <h3>{{ $jumlahSiswa }}</h3>
                            <p class="text-muted">Siswa</p>
                        </div>
                    </div>
                </div>
            @endisset

        </div>
    </div>
</div>

{{-- ==================== BERITA TERBARU ==================== --}}
<div class="container-fluid p-5 m-0" style="background-color: #001f3f;">
    <div class="row text-center text-white">
        <div class="col">
            <h1 class="p-3">Berita Terbaru</h1>
        </div>
    </div>

    <div class="gallery-wrapper" data-aos="fade-up">
        <div class="gallery">
            @isset($beritas)
                @foreach($beritas as $berita)
                    <div class="card shadow rounded-4 overflow-hidden d-inline-block m-2" style="width: 20rem;">
                        <img src="{{ asset('asset/image/' . $berita->gambar) }}"
                             class="card-img-top"
                             alt="{{ $berita->judul }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <a href="{{ route('berita.show', $berita->id_berita) }}"
                               class="btn btn-warning rounded-pill mb-3 fw-semibold text-decoration-none">
                               {{Str::limit($berita->judul,'20','...') }}
                            </a><br>
                            <small class="card-text">Tanggal: {{ $berita->tanggal }}</small>
                            <p class="card-text mt-2">{{ Str::limit($berita->isi, 50, '...') }}</p>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('berita') }}" class="btn btn-light btn-lg">Lihat Selengkapnya →</a>
    </div>
</div>

{{-- ==================== EKSTRAKURIKULER ==================== --}}
<div class="container-fluid p-5 m-0" style="background-color: #f4f3f3;">
    <div class="row text-center">
        <div class="col">
            <h1 class="p-3" style="color: #001f3f;">Gambaran Program Ekstrakurikuler</h1>
            <p style="color: #001f3f;">Berikut adalah gambaran program ekstrakurikuler yang kami miliki di SMA TIRTA XSHAVIERUS:</p>
        </div>
    </div>

    <div class="gallery-wrapper" data-aos="fade-up">
        <div class="gallery">
            @isset($ekskuls)
                @foreach($ekskuls as $ekskul)
                    <div class="card shadow rounded-4 overflow-hidden d-inline-block m-2" style="width: 20rem;">
                        <img src="{{ asset('asset/image/' . $ekskul->gambar) }}"
                             class="card-img-top"
                             alt="{{ $ekskul->nama_ekskul }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <a href="{{ route('ekskul.show', $ekskul->id_ekskul) }}"
                               class="btn btn-warning rounded-pill mb-3 fw-semibold text-decoration-none">
                               {{ $ekskul->nama_ekskul }}
                            </a>
                            <p class="card-text">{{ Str::limit($ekskul->deskripsi, 50, '...') }}</p>
                            <small class="text-muted d-block">Pembina: {{ $ekskul->pembina }}</small>
                            <small class="text-muted d-block">Jadwal: {{ $ekskul->jadwal_latihan }}</small>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('ekskul') }}" class="btn text-white" style="background-color: #001f3f">Lihat Selengkapnya →</a>
    </div>
</div>

{{-- ==================== FAQ ==================== --}}
<div class="container p-4" id="pertanyaan" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="text-center mb-4" data-aos="zoom-in" data-aos-delay="200">Pertanyaan Yang Sering Diajukan</h2>
    <div class="accordion p-2" id="faqAccordion" data-aos="fade-up" data-aos-delay="400">

        {{-- FAQ Item 1 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Apa saja syarat pendaftaran di SMA TIRTA XSHAVIERUS?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show"
                 aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Untuk mendaftar, calon siswa harus mengisi formulir pendaftaran, melampirkan fotokopi akta kelahiran,
                    kartu keluarga, dan pas foto terbaru. Selain itu, calon siswa juga harus mengikuti tes seleksi.
                </div>
            </div>
        </div>

        {{-- FAQ Item 2 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Bagaimana proses seleksi penerimaan siswa baru?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse"
                 aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Proses seleksi meliputi tes akademik, wawancara, dan penilaian prestasi non-akademik.
                    Calon siswa yang lolos seleksi diumumkan melalui website resmi sekolah.
                </div>
            </div>
        </div>

        {{-- FAQ Item 3 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Apakah ada beasiswa yang tersedia untuk siswa berprestasi?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse"
                 aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Ya, SMA TIRTA XSHAVIERUS menyediakan beasiswa bagi siswa berprestasi akademik maupun non-akademik.
                </div>
            </div>
        </div>

        {{-- FAQ Item 4 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Apa saja fasilitas yang disediakan oleh sekolah?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse"
                 aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    SMA TIRTA XSHAVIERUS menyediakan laboratorium komputer, perpustakaan,
                    lapangan olahraga, ruang seni, dan kantin.
                </div>
            </div>
        </div>
    </div>
</div>

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
                <li>Tentang Kami</li>
                <li>Fasilitas</li>
                <li>Aktifitas</li>
                <li>Kalender Akademik</li>
                <li>Pendaftaran</li>
            </ul>
        </div>

        {{-- Tautan Cepat --}}
        <div class="col-md-3 mb-3">
            <h4 style="color: #001f3f;">Tautan Cepat</h4>
            <ul class="list-unstyled">
                <li><a href="{{ route('informasi') }}" class="text-decoration-none" style="color:#001f3f;">Informasi Sekolah</a></li>
                <li>Hubungi Kami</li>
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
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-linkedin"></i>
            </div>
        </div>
    </div>
    <hr>
    <div class="text-center">
        <p class="mb-0">Copyright © 2024 SMA Xshavierus. All Right Reserved.</p>
    </div>
</footer>

{{-- ==================== CSS SCROLL MARQUEE ==================== --}}
@push('styles')
<style>
    .gallery-wrapper {
        overflow: hidden;
        position: relative;
        padding: 10px 0;
        width: 100%;
    }

    .gallery {
        display: flex;
        gap: 1rem;
        width: max-content;
        animation: marquee 40s linear infinite;
    }

    .gallery:hover {
        animation-play-state: paused;
    }

    @keyframes marquee {
        0%   { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
</style>
@endpush

@endsection
