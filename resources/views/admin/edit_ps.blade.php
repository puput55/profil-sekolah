@extends('admin.template')
@section('content')

<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit Profil Sekolah</h4>
        </div>

        {{-- ==================== FORM EDIT PROFIL SEKOLAH ==================== --}}
        <form action="{{ route('Admin.ps.update', $profils->id_profil) }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Sekolah --}}
            <div class="mb-3">
                <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                <input type="text"
                       name="nama_sekolah"
                       id="nama_sekolah"
                       class="form-control"
                       value="{{ $profils->nama_sekolah }}"
                       required>
            </div>

            {{-- Kepala Sekolah --}}
            <div class="mb-3">
                <label for="kepala_sekolah" class="form-label">Kepala Sekolah</label>
                <input type="text"
                       name="kepala_sekolah"
                       id="kepala_sekolah"
                       class="form-control"
                       value="{{ $profils->kepala_sekolah }}"
                       required>
            </div>

            {{-- Foto Kepala Sekolah --}}
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Kepala Sekolah</label><br>
                @if ($profils->foto)
                    <img src="{{ asset('asset/image/' . $profils->foto) }}"
                         alt="Foto Kepala Sekolah"
                         width="120"
                         class="mb-2 rounded">
                    <br>
                @endif
                <input type="file" name="foto" id="foto" class="form-control">
            </div>

            {{-- Logo Sekolah --}}
            <div class="mb-3">
                <label for="logo" class="form-label">Logo Sekolah</label><br>
                @if ($profils->logo)
                    <img src="{{ asset('asset/image/' . $profils->logo) }}"
                         alt="Logo Sekolah"
                         width="120"
                         class="mb-2 rounded">
                    <br>
                @endif
                <input type="file" name="logo" id="logo" class="form-control">
            </div>

            {{-- NPSN --}}
            <div class="mb-3">
                <label for="npsn" class="form-label">NPSN</label>
                <input type="number"
                       name="npsn"
                       id="npsn"
                       class="form-control"
                       value="{{ $profils->npsn }}">
            </div>

            {{-- Alamat Sekolah --}}
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat"
                          id="alamat"
                          rows="4"
                          class="form-control"
                          required>{{ $profils->alamat }}</textarea>
            </div>

            {{-- Kontak --}}
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="number"
                       name="kontak"
                       id="kontak"
                       class="form-control"
                       value="{{ $profils->kontak }}"
                       required>
            </div>

            {{-- Visi Misi --}}
            <div class="mb-3">
                <label for="visi_misi" class="form-label">Visi Misi</label>
                <textarea name="visi_misi"
                          id="visi_misi"
                          rows="4"
                          class="form-control"
                          required>{{ $profils->visi_misi }}</textarea>
            </div>

            {{-- Tahun Berdiri --}}
            <div class="mb-3">
                <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                <input type="number"
                       name="tahun_berdiri"
                       id="tahun_berdiri"
                       class="form-control"
                       min="1900"
                       max="{{ date('Y') }}"
                       value="{{ $profils->tahun_berdiri }}"
                       required>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi"
                          id="deskripsi"
                          rows="4"
                          class="form-control">{{ $profils->deskripsi }}</textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('Admin.ps.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
