@extends('template')

@section('content')
<div class="container-fluid">

    {{-- ==================== JUDUL HALAMAN ==================== --}}
    <div class="text-center mb-0">
        <h1 class="p-4" style="color: #001f3f;">Berita</h1>
    </div>

    {{-- ==================== DAFTAR BERITA ==================== --}}
    <div class="row g-3 px-3 mb-5 mt-0">
        @foreach ($beritas as $berita)
            @php
                // Daftar animasi AOS yang dipakai (bergiliran)
                $animations = ['fade-up', 'zoom-in', 'fade-up-right'];

                // Pilih animasi sesuai urutan berita
                $animation = $animations[$loop->index % count($animations)];

                // Delay supaya animasi muncul bergantian
                $delay = ($loop->index % 3) * 100;
            @endphp

            {{-- Card Berita --}}
            <div class="col-md-6 col-lg-4 col-xl-4 d-flex"
                 data-aos="{{ $animation }}"
                 data-aos-delay="{{ $delay }}">
                <div class="card shadow rounded-4 overflow-hidden w-100 h-100">

                    {{-- Gambar Berita --}}
                    <img src="{{ asset('asset/image/'.$berita->gambar) }}"
                         class="card-img-top"
                         alt="{{ $berita->judul }}"
                         style="height: 200px; width: 100%; object-fit: cover;">

                    {{-- Isi Card --}}
                    <div class="card-body d-flex flex-column">

                        {{-- Judul (link ke detail berita) --}}
                        <a href="{{ route('berita.show', $berita->id_berita) }}"
                           class="btn btn-warning rounded-pill mb-3 fw-semibold text-decoration-none">
                            {{ $berita->judul }}
                        </a>

                        {{-- Tanggal --}}
                        <small class="text-muted mb-2">
                            Tanggal: {{ $berita->tanggal }}
                        </small>

                        {{-- Ringkasan isi --}}
                        <p class="card-text flex-grow-1" style="text-align: justify;">
                            {{ Str::limit($berita->isi, 100, '...') }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
