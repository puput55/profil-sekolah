@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Tambah Siswa</h4>
        </div>

        {{-- ==================== FORM TAMBAH SISWA ==================== --}}
        <form action="{{ route('Admin.siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Token keamanan Laravel --}}

            {{-- Input NISN --}}
            <div class="mb-3">
                <label class="form-label">NISN</label>
                <input type="number" name="nisn" class="form-control" id="nisn" required>
            </div>

            {{-- Input Nama Siswa --}}
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" required>
            </div>

            {{-- Pilih Jenis Kelamin --}}
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                    <option selected disabled value="">Pilih JK</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            {{-- Input Tahun Masuk --}}
            <div class="mb-3">
                <label class="form-label">Tahun Masuk</label>
                <input type="text"
                       name="tahun_masuk"
                       class="form-control"
                       id="tahun_masuk"
                       min="1900"
                       max="{{ date('Y') }}"
                       required>
            </div>

            {{-- Tombol Submit & Batal --}}
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('Admin.siswa.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
