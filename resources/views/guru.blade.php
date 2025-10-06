@extends('template')

@section('content')

{{-- ==================== DAFTAR GURU ==================== --}}
<div class="container py-5">
    <!-- Judul Halaman -->
    <h2 class="mb-4 text-center fw-bold" style="color:#001f3f;">
        Daftar Guru SMA XSHAVIERUS
    </h2>

    <div class="row justify-content-center g-4">
        {{-- Looping Data Guru --}}
        @forelse ($guru as $item)
            <div class="col-md-3 mb-4"
                 data-aos="zoom-in"
                 data-aos-duration="800"
                 data-aos-delay="{{ $loop->index * 150 }}">

                <!-- Kartu Guru -->
                <div class="card h-100 shadow-sm">

                    {{-- Foto Guru --}}
                    <img src="{{ asset('asset/image/'.$item->foto) }}"
                         class="card-img-top"
                         alt="{{ $item->nama_guru }}"
                         style="height: 250px; object-fit: cover;">

                    {{-- Informasi Guru --}}
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1">{{ $item->nama_guru }}</h5>
                        <p class="text-muted mb-1">NIP: {{ $item->nip }}</p>
                        <p class="fw-bold">{{ $item->mapel }}</p>
                    </div>
                </div>
            </div>
        @empty
            {{-- Jika Data Guru Kosong --}}
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada data guru yang ditampilkan.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection
