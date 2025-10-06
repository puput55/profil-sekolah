@extends('template')

@section('content')

    {{-- ==================== BANNER POSTER ==================== --}}
    <section class="text-center py-4" data-aos="zoom-in">
        <div class="container">
            <h1 class="text-center" style="color: #001f3f">Welcome To SMA Xshavierus</h1>
            <p>
                An International Baccalaureate (IB) Continuum School <br>
                and Fully Accredited by WASC
            </p>
            <img src="{{ asset('storage/asset/image/poster.png') }}"
                 alt="Poster Informasi Sekolah"
                 class="img-fluid shadow-lg rounded-4"
                 style="max-width: 900px; height: auto;">
        </div>
    </section>

    {{-- ==================== INFORMASI SEKOLAH ==================== --}}
    <section class="container py-5">
        <h1 class="mb-4 text-center fw-bold" style="color:#001f3f;">Informasi Sekolah</h1>

        <div class="row">
            {{-- Fasilitas --}}
            <div class="col-md-6 mb-4">
                <h3 class="fw-semibold">Fasilitas Sekolah</h3>
                <ul>
                    <li>30 Ruang Kelas</li>
                    <li>3 Laboratorium (Komputer, IPA, Bahasa)</li>
                    <li>Perpustakaan Digital</li>
                    <li>Lapangan Olahraga Serbaguna</li>
                    <li>Ruang Seni & Musik</li>
                </ul>
            </div>

            {{-- Data Sekolah --}}
            <div class="col-md-6 mb-4">
                <h3 class="fw-semibold">Data Sekolah</h3>
                <ul>
                    <li>Siswa Aktif: 900+</li>
                    <li>Guru & Staf: 65</li>
                    <li>Ekstrakurikuler: 15 Program</li>
                    <li>Prestasi: Juara OSN, O2SN, FLS2N</li>
                </ul>
            </div>
        </div>

        {{-- PPDB --}}
        <div class="text-center mt-5">
            <h3 class="fw-semibold">Pendaftaran Siswa Baru (PPDB)</h3>
            <p class="mb-4">
                Pendaftaran siswa baru dibuka setiap bulan <b>Mei–Juni</b> melalui website resmi sekolah.
                <br>
                Calon siswa wajib menyiapkan berkas:
                <i>Akta Lahir, Kartu Keluarga, Ijazah SMP/MTs, dan pas foto terbaru</i>.
            </p>
        </div>
    </section>

@endsection
