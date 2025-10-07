@extends('admin.template')
@section('content')

<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit Ekstrakurikuler</h4>
        </div>

        {{-- ==================== FORM EDIT EKSKUL ==================== --}}
        <form action="{{ route('Admin.ekskul.update', $ekskul->id_ekskul) }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Ekskul --}}
            <div class="mb-3">
                <label for="nama_ekskul" class="form-label">Nama Ekskul</label>
                <input type="text"
                       name="nama_ekskul"
                       id="nama_ekskul"
                       class="form-control"
                       value="{{ $ekskul->nama_ekskul }}"
                       required>
            </div>

            {{-- Pembina --}}
            <div class="mb-3">
                <label for="pembina" class="form-label">Pembina</label>
                <input type="text"
                       name="pembina"
                       id="pembina"
                       class="form-control"
                       value="{{ $ekskul->pembina }}"
                       required>
            </div>

            {{-- Jadwal Latihan --}}
            <div class="mb-3">
                <label for="jadwal_latihan" class="form-label">Jadwal Latihan</label>
                <input type="text"
                       name="jadwal_latihan"
                       id="jadwal_latihan"
                       class="form-control"
                       value="{{ $ekskul->jadwal_latihan }}"
                       required>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi"
                          id="deskripsi"
                          class="form-control"
                          rows="4"
                          required>{{ $ekskul->deskripsi }}</textarea>
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label><br>
                @if ($ekskul->gambar)
                    <img src="{{ asset('asset/image/'. $ekskul->gambar) }}"
                         alt="Gambar Ekskul"
                         width="120"
                         class="mb-2 rounded">
                    <br>
                @endif
                <input type="file" name="gambar" id="gambar" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mb-3">
                <button type="submit" class="btn text-white" style="background-color: #001f3f;">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('Admin.ekskul.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
