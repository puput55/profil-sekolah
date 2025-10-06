@extends('admin.template')
@section('content')

<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit Siswa</h4>
        </div>

        {{-- ==================== FORM EDIT SISWA ==================== --}}
        <form action="{{ route('Admin.siswa.update', $siswa->id_siswa) }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            {{-- NISN --}}
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="number"
                       name="nisn"
                       id="nisn"
                       class="form-control"
                       value="{{ $siswa->nisn }}"
                       required>
            </div>

            {{-- Nama Siswa --}}
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text"
                       name="nama_siswa"
                       id="nama_siswa"
                       class="form-control"
                       value="{{ $siswa->nama_siswa }}"
                       required>
            </div>

            {{-- Jenis Kelamin --}}
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                    <option value="Laki-Laki" {{ $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Tahun Masuk --}}
            <div class="mb-3">
                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                <input type="text"
                       name="tahun_masuk"
                       id="tahun_masuk"
                       class="form-control"
                       value="{{ $siswa->tahun_masuk }}"
                       required>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('Admin.siswa.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
