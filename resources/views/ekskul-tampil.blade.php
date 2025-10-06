@extends('template')

@section('content')

<div class="container my-5" data-aos="fade-up">
    @isset($ekskul)
    <div class="card shadow rounded-4 p-4">
        <!-- Nama Ekskul -->
        <h2 class="mb-3 text-center">{{ $ekskul->nama_ekskul }}</h2>

        <!-- Gambar -->
        <div class="text-center mb-4">
            <img src="{{ asset('asset/image/'.$ekskul->gambar) }}"
            alt="{{ $ekskul->nama_ekskul }}"
            class="img-fluid rounded"
            style="max-height:400px; object-fit:cover;">
        </div>

        <!-- Pembina -->
        <p class="text-muted text-center mb-1">
            <strong>Pembina:</strong> {{ $ekskul->pembina }}
        </p>

        <!-- Jadwal Latihan -->
        <p class="text-muted text-center mb-4">
            <strong>Jadwal Latihan:</strong> {{ $ekskul->jadwal_latihan }}
        </p>
        <!-- Deskripsi -->
        <p style="text-align: justify; font-size: 1.1rem; line-height:1.7;">
            {{ $ekskul->deskripsi }}
        </p>

        <!-- Tombol kembali -->
        <div class="mt-4 text-center">
            <a href="{{ route('ekskul') }}" class="btn btn-secondary">← Kembali ke Ekskul</a>
        </div>
    </div>
    @endisset
</div>

@endsection
