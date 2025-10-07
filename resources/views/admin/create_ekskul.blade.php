@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Tambah Ekstrakurikuler</h4>
        </div>

        {{-- ==================== FORM TAMBAH EKSKUL ==================== --}}
        <form action="{{ route('Admin.ekskul.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Token keamanan Laravel --}}

            {{-- Nama Ekskul --}}
            <div class="mb-3">
                <label class="form-label">Nama Ekskul</label>
                <input type="text" name="nama_ekskul" class="form-control" id="nama_ekskul" required>
            </div>

            {{-- Nama Pembina --}}
            <div class="mb-3">
                <label class="form-label">Pembina</label>
                <input type="text" name="pembina" class="form-control" id="pembina" required>
            </div>

            {{-- Jadwal Latihan --}}
            <div class="mb-3">
                <label class="form-label">Jadwal Latihan</label>
                <input type="text" name="jadwal_latihan" class="form-control" id="jadwal_latihan" required>
            </div>

            {{-- Deskripsi Ekskul --}}
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required></textarea>
            </div>

            {{-- Upload Gambar --}}
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" id="gambar" required>
                <small class="text-muted">Format: jpg, jpeg, png. Maks 2MB</small>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mb-3">
                <button type="submit" class="btn text-white" style="background-color: #001f3f;">Tambah</button>
                <a href="{{ route('Admin.ekskul.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
