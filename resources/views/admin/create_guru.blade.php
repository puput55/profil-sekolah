@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Tambah Guru</h4>
        </div>

        {{-- ==================== ALERT VALIDASI ERROR ==================== --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ==================== FORM TAMBAH GURU ==================== --}}
        <form action="{{ route('Admin.guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Token keamanan Laravel --}}

            {{-- Input Nama Guru --}}
            <div class="mb-3">
                <label class="form-label">Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control" id="nama_guru" required>
            </div>

            {{-- Input NIP --}}
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="number" name="nip" class="form-control" id="nip" required>
            </div>

            {{-- Input Mata Pelajaran --}}
            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control" id="mapel" required>
            </div>

            {{-- Upload Foto Guru --}}
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control" id="foto" required>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mb-3">
                <button type="submit" class="btn text-white" style="background-color: #001f3f;">Tambah</button>
                <a href="{{ route('Admin.guru.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
