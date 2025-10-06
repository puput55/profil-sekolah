@extends('template')

@section('content')
<div class="container my-5" data-aos="fade-up">
    @isset($berita)

    {{-- ==================== CARD DETAIL BERITA ==================== --}}
    <div class="card shadow rounded-4 p-4">

        {{-- Judul Berita --}}
        <h2 class="mb-3 text-center">{{ $berita->judul }}</h2>

        {{-- Tanggal Berita --}}
        <p class="text-muted text-center">
            Tanggal: {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
        </p>

        {{-- Gambar Utama --}}
        <div class="text-center mb-4">
            <img src="{{ asset('asset/image/'.$berita->gambar) }}"
                 alt="{{ $berita->judul }}"
                 class="img-fluid rounded"
                 style="max-height:400px; object-fit:cover;">
        </div>

        {{-- Isi Berita Lengkap --}}
        <p style="text-align: justify; font-size: 1.1rem; line-height:1.7;">
            {{ $berita->isi }}
        </p>

        {{-- Tombol Kembali --}}
        <div class="mt-4 text-center">
            <a href="{{ route('berita') }}" class="btn btn-secondary">
                ← Kembali ke Berita
            </a>
        </div>
    </div>
    {{-- ==================== END CARD DETAIL ==================== --}}

    @endisset
</div>
@endsection
