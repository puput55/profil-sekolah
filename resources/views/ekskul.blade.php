@extends('template')

@section('content')

{{-- ==================== EKSTRAKURIKULER ==================== --}}
<div class="container py-5">

    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h3 class="fw-bold" style="color: #001f3f;">Ekstrakurikuler</h3>
    </div>

    {{-- Daftar Ekstrakurikuler --}}
    <div class="row g-4" data-aos="fade-up">
        @foreach($ekskuls as $ekskul)
            <div class="col-md-6 col-lg-4 col-xl-3 d-flex">
                <div class="card shadow rounded-4 overflow-hidden w-100 h-100">

                    {{-- Gambar Ekskul --}}
                    <img src="{{ asset('asset/image/' . $ekskul->gambar) }}"
                         class="card-img-top"
                         alt="{{ $ekskul->nama_ekskul }}"
                         style="height: 200px; object-fit: cover; width: 100%;">

                    {{-- Isi Card --}}
                    <div class="card-body d-flex flex-column">

                        {{-- Nama Ekskul (button ke detail) --}}
                        <a href="{{ route('ekskul.show', $ekskul->id_ekskul) }}"
                           class="btn btn-warning rounded-pill mb-3 fw-semibold text-decoration-none">
                            {{ $ekskul->nama_ekskul }}
                        </a>

                        {{-- Deskripsi singkat --}}
                        <p class="card-text flex-grow-1" style="text-align: justify;">
                            {{ Str::limit($ekskul->deskripsi, 100, '...') }}
                        </p>

                        {{-- Informasi Pembina & Jadwal --}}
                        <div class="mt-3">
                            <small class="text-muted d-block">
                                Pembina: {{ $ekskul->pembina }}
                            </small>
                            <small class="text-muted d-block">
                                Jadwal: {{ $ekskul->jadwal_latihan }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
