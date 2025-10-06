@extends('admin.template')
@section('content')

<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit Berita</h4>
        </div>

        {{-- ==================== FORM EDIT BERITA ==================== --}}
        <form action="{{ route('Admin.berita.update', $berita->id_berita) }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text"
                       name="judul"
                       id="judul"
                       class="form-control"
                       value="{{ $berita->judul }}"
                       required>
            </div>

            {{-- Isi --}}
            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <textarea name="isi"
                          id="isi"
                          class="form-control"
                          rows="6"
                          required>{{ $berita->isi }}</textarea>
            </div>

            {{-- Tanggal --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date"
                       name="tanggal"
                       id="tanggal"
                       class="form-control"
                       value="{{ $berita->tanggal }}"
                       required>
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label><br>
                @if ($berita->gambar)
                    <img src="{{ asset('asset/image/'. $berita->gambar) }}"
                         alt="Gambar Berita"
                         width="120"
                         class="mb-2 rounded">
                    <br>
                @endif
                <input type="file" name="gambar" id="gambar" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('Admin.berita.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
