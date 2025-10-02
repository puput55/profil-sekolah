@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Edit Galeri</h4>
        </div>
            <div class="mb-3">
                <form action="{{route('Admin.galeri.update',$galeri->id_galeri)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" value="{{$galeri->judul}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="4" required>{{$galeri->keterangan}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">file</label>
                        @if ($galeri->file)
                        <img src="{{asset('asset/image/'.$galeri->file)}}" alt="" width="120" class="mb-2">
                        <br>
                        @endif
                        <input type="file" name="file" class="form-control" id="file" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-control" id="kategori" required>
                            <option value="foto"{{$galeri->kategori == 'foto' ? 'selected' : ''}}>Foto</option>
                            <option value="video"{{$galeri->kategori == 'video' ? 'selected' : ''}}>Video</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{$galeri->tanggal}}" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('Admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection
