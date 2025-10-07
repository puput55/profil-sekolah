@extends('admin.template')
@section('content')

<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit Galeri</h4>
        </div>

        {{-- ==================== FORM EDIT GALERI ==================== --}}
        <form action="{{ route('Admin.galeri.update', $galeri->id_galeri) }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text"
                       name="judul"
                       id="judul"
                       class="form-control"
                       value="{{ $galeri->judul }}"
                       required>
            </div>

            {{-- Keterangan --}}
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan"
                          id="keterangan"
                          class="form-control"
                          rows="4"
                          required>{{ $galeri->keterangan }}</textarea>
            </div>

            {{-- File Lama --}}
            <div class="mb-3">
                <label class="form-label">File</label><br>
                @if ($galeri->file)
                    @if ($galeri->kategori == 'foto')
                        <img src="{{ asset('asset/image/'.$galeri->file) }}"
                             alt="Foto Galeri"
                             width="120"
                             class="mb-2 rounded">
                    @elseif ($galeri->kategori == 'video')
                        <video width="200" controls class="mb-2 rounded">
                            <source src="{{ asset('asset/image/'.$galeri->file) }}" type="video/mp4">
                            Browser tidak mendukung tag video.
                        </video>
                    @endif
                    <br>
                @endif
                <input type="file" name="file" id="file" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="foto" {{ $galeri->kategori == 'foto' ? 'selected' : '' }}>Foto</option>
                    <option value="video" {{ $galeri->kategori == 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>

            {{-- Tanggal --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date"
                       name="tanggal"
                       id="tanggal"
                       class="form-control"
                       value="{{ $galeri->tanggal }}"
                       required>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mb-3">
                <button type="submit" class="btn text-white" style="background-color: #001f3f;">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('Admin.galeri.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
