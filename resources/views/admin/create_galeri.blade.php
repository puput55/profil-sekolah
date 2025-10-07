@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Tambah Galeri</h4>
        </div>

        {{-- ==================== FORM TAMBAH GALERI ==================== --}}
        <form action="{{ route('Admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Token keamanan Laravel --}}

            {{-- Input Judul Galeri --}}
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" id="judul" required>
            </div>

            {{-- Input Keterangan --}}
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan" rows="4" required></textarea>
            </div>

            {{-- Upload File (Foto / Video) --}}
            <div class="mb-3">
                <label class="form-label">File</label>
                <input type="file" name="file" class="form-control" id="file" required>
                <small class="text-muted">Format: jpg, jpeg, png, mp4, avi, mov (maks. 30MB)</small>
            </div>

            {{-- Pilih Kategori --}}
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-control" id="kategori" required>
                    <option selected disabled value="">Pilih Kategori</option>
                    <option value="foto">Foto</option>
                    <option value="video">Video</option>
                </select>
            </div>

            {{-- Input Tanggal --}}
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal" required>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mb-3">
                <button type="submit" class="btn text-white" style="background-color: #001f3f;">Simpan</button>
                <a href="{{ route('Admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
