@extends('admin.template')
@section('content')

<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit Guru</h4>
        </div>

        {{-- ==================== FORM EDIT GURU ==================== --}}
        <form action="{{ route('Admin.guru.update', $guru->id_guru) }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Guru --}}
            <div class="mb-3">
                <label for="nama_guru" class="form-label">Nama Guru</label>
                <input type="text"
                       name="nama_guru"
                       id="nama_guru"
                       class="form-control"
                       value="{{ $guru->nama_guru }}"
                       required>
            </div>

            {{-- NIP --}}
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="number"
                       name="nip"
                       id="nip"
                       class="form-control"
                       value="{{ $guru->nip }}"
                       required>
            </div>

            {{-- Mata Pelajaran --}}
            <div class="mb-3">
                <label for="mapel" class="form-label">Mata Pelajaran</label>
                <input type="text"
                       name="mapel"
                       id="mapel"
                       class="form-control"
                       value="{{ $guru->mapel }}"
                       required>
            </div>

            {{-- Foto --}}
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label><br>
                @if ($guru->foto)
                    <img src="{{ asset('asset/image/' . $guru->foto) }}"
                         alt="Foto Guru"
                         width="120"
                         class="mb-2 rounded">
                    <br>
                @endif
                <input type="file" name="foto" id="foto" class="form-control">
            </div>

            {{-- Tombol Aksi --}}
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('Admin.guru.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
