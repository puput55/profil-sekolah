@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Tambah Guru</h4>
        </div>
            <div class="mb-3">
                 <form action="{{route('Admin.guru.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control" id="nama_guru" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <input type="number" name="nip" class="form-control" id="nip" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control" id="mapel" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" id="foto" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{route('Admin.guru.index')}}" class="btn btn-secondary">Batal</a>
                </div>
                 </form>
            </div>
    </div>
</div>
@endsection
