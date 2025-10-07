@extends('admin.template')

@section('content')
<!-- Card utama untuk form tambah berita -->
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        <!-- Header form dengan judul -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Tambah Berita</h4>
        </div>

        <!-- Form untuk menambahkan berita -->
        <!-- enctype="multipart/form-data" diperlukan karena ada input file -->
        <form action="{{ route('Admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Token CSRF untuk keamanan form -->

            <!-- Input judul berita -->
            <div class="mb-3">
                <label class="form-label" for="judul">Judul Berita</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>

            <!-- Input isi berita -->
            <div class="mb-3">
                <label class="form-label" for="isi">Isi Berita</label>
                <textarea name="isi" id="isi" class="form-control" rows="3" required></textarea>
            </div>

            <!-- Input tanggal berita -->
            <div class="mb-3">
                <label class="form-label" for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <!-- Input gambar berita -->
            <div class="mb-3">
                <label class="form-label" for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" required>
            </div>

            <!-- Tombol aksi -->
            <button type="submit" class="btn text-white" style="background-color: #001f3f;">Tambah</button>
            <a href="{{ route('Admin.berita.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
