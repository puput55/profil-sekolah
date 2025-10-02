@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Tambah Berita</h4>
        </div>
            <form action="{{route('Admin.berita.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul Berita</label>
                    <input type="text" name="judul" class="form-control" id="judul" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Isi Berita</label>
                    <textarea class="form-control" name="isi" id="isi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{route('Admin.berita.index')}}" class="btn btn-secondary">Batal</a>
            </form>
    </div>
</div>
@endsection
