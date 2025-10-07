@extends('template')
@section('content')

{{-- ==================== CARD UTAMA ==================== --}}
{{-- Membungkus seluruh tampilan halaman daftar siswa --}}
<div class="card shadow p-2" style="border-radius:10px;">

    {{-- ==================== ALERT ERROR VALIDASI ==================== --}}
    {{-- Menampilkan pesan error jika ada kesalahan pada form input --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{-- Menampilkan daftar pesan error --}}
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ==================== ALERT SUCCESS ==================== --}}
    {{-- Menampilkan pesan sukses ketika data berhasil ditambah, diubah, atau dihapus --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
            {{-- Tombol untuk menutup pesan sukses --}}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ==================== ISI CARD ==================== --}}
    <div class="card-body">

        {{-- ==================== HEADER DAN TOMBOL TAMBAH ==================== --}}
        {{-- Menampilkan judul halaman dan tombol untuk menambah data siswa --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Daftar Siswa</h4>
        </div>

        {{-- ==================== TABEL DATA SISWA ==================== --}}
        {{-- Menampilkan daftar siswa dalam bentuk tabel --}}
        <table class="table table-bordered table-hover align-middle">

            {{-- ==================== HEADER TABEL ==================== --}}
            {{-- Menentukan nama kolom pada tabel --}}
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                </tr>
            </thead>

            {{-- ==================== ISI DATA TABEL ==================== --}}
            {{-- Melakukan perulangan untuk menampilkan setiap data siswa --}}
            <tbody>
                @foreach ($siswas as $siswa)
                <tr>
                    {{-- Kolom ID Siswa --}}
                    <td>{{ $siswa->id_siswa }}</td>

                    {{-- Kolom NISN Siswa --}}
                    <td>{{ $siswa->nisn }}</td>

                    {{-- Kolom Nama Siswa --}}
                    <td>{{ $siswa->nama_siswa }}</td>

                    {{-- Kolom Jenis Kelamin --}}
                    <td>{{ $siswa->jenis_kelamin }}</td>

                    {{-- Kolom Tahun Masuk --}}
                    <td>{{ $siswa->tahun_masuk }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
