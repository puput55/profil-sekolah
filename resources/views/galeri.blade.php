@extends('template')

@section('content')

{{-- ==================== GALERI ==================== --}}
<div class="container-fluid">

    {{-- Judul Halaman --}}
    <div class="text-center mb-0">
        <h1 class="p-4" style="color: #001f3f;">Galeri</h1>
    </div>

    {{-- Daftar Galeri --}}
    <div class="row g-4 px-3 mb-5 mt-0" data-aos="fade-up">
        @foreach ($galeris as $galeri)
            <div class="col-md-6 col-lg-4 col-xl-3 d-flex">
                <div class="card shadow rounded-4 overflow-hidden w-100 h-100">

                    {{-- File (Foto / Video) --}}
                    @if ($galeri->kategori == 'foto')
                        {{-- Jika kategori foto --}}
                        <img src="{{ asset('asset/image/'.$galeri->file) }}"
                             class="card-img-top"
                             alt="{{ $galeri->judul }}"
                             style="height: 200px; object-fit: cover;">
                    @elseif ($galeri->kategori == 'video')
                        {{-- Jika kategori video --}}
                        <video class="w-100" height="200" controls style="object-fit: cover;">
                            <source src="{{ asset('asset/image/'.$galeri->file) }}" type="video/mp4">
                            Browser anda tidak mendukung tag video.
                        </video>
                    @endif

                    {{-- Isi Card --}}
                    <div class="card-body d-flex flex-column">

                        {{-- Judul Galeri --}}
                        <span class="btn btn-warning rounded-pill mb-3 fw-semibold">
                            {{ $galeri->judul }}
                        </span>

                        {{-- Tanggal Upload --}}
                        <small class="text-muted mb-2">
                            Tanggal: {{ $galeri->tanggal }}
                        </small>

                        {{-- Keterangan --}}
                        <p class="card-text flex-grow-1" style="text-align: justify;">
                            {{ Str::limit($galeri->keterangan, 600, '...') }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
