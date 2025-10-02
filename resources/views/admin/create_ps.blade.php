@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius:10px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Tambah Profil Siswa</h4>
        </div>
            <div class="mb-3">
            <form action="{{route('Admin.ps.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label class="form-label">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kepala Sekolah</label>
                <input type="text" name="kepala_sekolah" class="form-control" id="kepala_sekolah" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control" id="foto" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control" id="logo" required>
            </div>
            <div class="mb-3">
                <label class="form-label">NPSN</label>
                <input type="text" name="npsn" class="form-control" id="npsn" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="number" name="kontak" class="form-control" id="kontak" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Visi Misi</label>
                <textarea name="visi_misi" id="visi_misi" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Berdiri</label>
                <input type="number" name="tahun_berdiri" class="form-control" id="tahun_berdiri"
                min="1900" max="{{date('Y')}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{route('Admin.ps.index')}}" class="btn btn-secondary">Batal</a>
            </form>
            </div>
    </div>
</div>

@endsection
