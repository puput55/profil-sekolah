@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Edit Berita</h4>
        </div>
            <div class="mb-3">
                <form action="{{route('Admin.berita.update', $berita->id_berita)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" value="{{$berita->judul}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi</label>
                        <textarea name="isi" id="isi" class="form-control" required>{{$berita->isi}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{$berita->tanggal}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        @if ($berita->gambar)
                        <img src="{{asset('asset/image/'. $berita->gambar)}}" alt="" width="120" class="mb-2">
                        <br>
                        @endif
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                    <a href="{{route('Admin.berita.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
    </div>
</div>
@endsection
