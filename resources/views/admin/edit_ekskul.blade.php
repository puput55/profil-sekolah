@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Edit Ekstrakulikuler</h4>
        </div>
            <div class="mb-3">
                <form action="{{route('Admin.ekskul.update', $ekskul->id_ekskul)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Ekskul</label>
                        <input type="text" name="nama_ekskul" class="form-control" id="nama_ekskul" value="{{$ekskul->nama_ekskul}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pembina</label>
                        <input type="text" name="pembina" class="form-control" id="pembina" value="{{$ekskul->pembina}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jadwal Latihan</label>
                        <input type="text" name="jadwal_latihan" class="form-control" id="jadwal_latihan" value="{{$ekskul->jadwal_latihan}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required>{{$ekskul->deskripsi}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        @if ($ekskul->gambar)
                        <img src="{{asset('asset/image/'. $ekskul->gambar)}}" alt="" width="120" class="mb-2">
                        <br>
                        @endif
                        <input type="file" name="gambar" class="form-control" id="gambar">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('Admin.ekskul.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection
