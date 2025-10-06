@extends('template')

@section('content')

{{-- ==================== HERO SECTION ==================== --}}
<div class="container-fluid w-100 p-0 m-0" data-aos="fade-down">
    <div class="position-relative text-white"
         style="background-image: url('{{ asset('storage/asset/image/high-school.jpg') }}');
                background-size: cover; background-position: center; height: 100vh;">
        <div class="d-flex flex-column justify-content-center h-100"
             style="background-color: rgba(0,0,0,0.5);">
            <h1 class="display-4 fw-bold mx-3" data-aos="zoom-in" data-aos-delay="200">
                Selamat Datang di SMA TIRTA XSHAVIERUS
            </h1>
            <p class="lead mt-3 mx-3" data-aos="fade-right" data-aos-delay="400">
                Sekolah dengan segudang prestasi dan fasilitas terbaik.
            </p>
            <div class="mt-2 mx-3" data-aos="fade-up" data-aos-delay="600">
                <a href="#pertanyaan" class="btn text-white" style="background-color: #001f3f">FAQ</a>
            </div>
        </div>
    </div>
</div>

{{-- ==================== SAMBUTAN & STATISTIK ==================== --}}
<div class="container-fluid p-5 m-0" style="background-color: #f1b434;">
    <div class="row justify-content-center mt-4" data-aos="fade-up" data-aos-duration="1000">
        @isset($profil)
        <!-- Sambutan Kepala Sekolah -->
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4 p-4 h-100 d-flex align-items-center">
                <div class="row align-items-center w-100">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <img src="{{ asset('asset/image/'.$profil->foto) }}"
                             alt="Foto Kepala Sekolah"
                             class="rounded-circle"
                             width="130" height="130"
                             style="object-fit: cover;">
                    </div>
                    <div class="col-md-9">
                        <h4 class="fw-bold">Sambutan Kepala Sekolah</h4>
                        <h5>{{ $profil->kepala_sekolah }}</h5>
                        <p class="text-muted mb-2">
                            {{ Str::limit($profil->deskripsi, 200, '...') }}
                        </p>
                        <a href="{{ route('ps') }}" class="btn btn-primary btn-sm">Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Data Sekolah -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 p-4 h-100 text-center">
                <h4 class="fw-bold mb-3">Statistik Data Sekolah</h4>
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-0">{{ $jumlahGuru }}</h3>
                        <small class="text-muted">Guru</small>
                    </div>
                    <div class="col-6">
                        <h3 class="mb-0">{{ $jumlahSiswa }}</h3>
                        <small class="text-muted">Siswa</small>
                    </div>
                </div>
            </div>
        </div>
        @endisset
    </div>
</div>

{{-- ==================== BERITA TERBARU (CAROUSEL 4 ITEM) ==================== --}}
<div class="container-fluid p-5 m-0" style="background-color: #001f3f;">
    <div class="row text-center text-white">
        <div class="col">
            <h1 class="p-3" data-aos="zoom-in">Berita Terbaru</h1>
        </div>
    </div>

    <div id="beritaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000" data-aos="fade-up">
        <div class="carousel-inner">
            @foreach($beritas->chunk(4) as $index => $chunk)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="row justify-content-center">
                    @foreach($chunk as $berita)
                    <div class="col-md-3 mb-3">
                        <div class="card shadow rounded-4 overflow-hidden h-100">
                            <img src="{{ asset('asset/image/' . $berita->gambar) }}"
                                 class="card-img-top"
                                 alt="{{ $berita->judul }}"
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body text-dark">
                                <a href="{{ route('berita.show', $berita->id_berita) }}"
                                   class="btn btn-warning rounded-pill mb-3 fw-semibold text-decoration-none w-100">
                                   {{ Str::limit($berita->judul, 30, '...') }}
                                </a>
                                <p class="card-text">{{ Str::limit($berita->isi, 100, '...') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#beritaCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#beritaCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('berita') }}" class="btn btn-light btn-lg">Lihat Selengkapnya →</a>
    </div>
</div>

{{-- ==================== EKSTRAKURIKULER (CAROUSEL 4 ITEM) ==================== --}}
<div class="container-fluid p-5 m-0" style="background-color: #f4f3f3;">
    <div class="row text-center">
        <div class="col">
            <h1 class="p-3" style="color: #001f3f;" data-aos="zoom-in">Gambaran Program Ekstrakurikuler</h1>
            <p style="color: #001f3f;" data-aos="fade-down">
                Berikut adalah gambaran program ekstrakurikuler yang kami miliki di SMA TIRTA XSHAVIERUS:
            </p>
        </div>
    </div>

    <div id="ekskulCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000" data-aos="fade-up">
        <div class="carousel-inner">
            @foreach($ekskuls->chunk(4) as $index => $chunk)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="row justify-content-center">
                    @foreach($chunk as $ekskul)
                    <div class="col-md-3 mb-3">
                        <div class="card shadow rounded-4 overflow-hidden h-100">
                            <img src="{{ asset('asset/image/' . $ekskul->gambar) }}"
                                 class="card-img-top"
                                 alt="{{ $ekskul->nama_ekskul }}"
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <a href="{{ route('ekskul.show', $ekskul->id_ekskul) }}"
                                   class="btn btn-warning rounded-pill mb-3 fw-semibold text-decoration-none w-100">
                                   {{ $ekskul->nama_ekskul }}
                                </a>
                                <p class="card-text">{{ Str::limit($ekskul->deskripsi, 100, '...') }}</p>
                                <small class="text-muted d-block">Pembina: {{ $ekskul->pembina }}</small>
                                <small class="text-muted d-block">Jadwal: {{ $ekskul->jadwal_latihan }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#ekskulCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#ekskulCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('ekskul') }}" class="btn text-white" style="background-color: #001f3f">
            Lihat Selengkapnya →
        </a>
    </div>
</div>

{{-- ==================== FAQ ==================== --}}
<div class="container p-4" id="pertanyaan">
    <h2 class="text-center mb-4" data-aos="flip-up">Pertanyaan Yang Sering Diajukan</h2>

    <div class="accordion p-2" id="faqAccordion" data-aos="fade-up" data-aos-delay="200">

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
                    Untuk mendaftar, calon siswa harus mengisi formulir pendaftaran, melampirkan akta lahir,
                    kartu keluarga, dan pas foto terbaru.
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
                    SMA TIRTA XSHAVIERUS memiliki laboratorium, perpustakaan, lapangan olahraga, ruang seni, dan kantin.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
