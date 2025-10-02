@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Edit Profil Siswa</h4>
        </div>
            <form action="{{route('Admin.ps.update', $profils->id_profil)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" value="{{$profils->nama_sekolah}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kepala Sekolah</label>
                    <input type="text" name="kepala_sekolah" class="form-control" id="kepala_sekolah" value="{{$profils->kepala_sekolah}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    @if ($profils->foto)
                    <img src="{{asset('asset/image/'. $profils->foto)}}" alt="" width="120" class="mb-2">
                    <br>
                    @endif
                    <input type="file" name="foto" class="form-control" id="foto" value="{{$profils->foto}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Logo</label>
                    @if ($profils->logo)
                    <img src="{{asset('asset/image/'.$profils->logo)}}" alt="" width="120" class="mb2">
                    <br>
                    @endif
                    <input type="file" name="logo" class="form-control" id="logo" value="{{$profils->logo}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">NPSN</label>
                    <input type="number" name="npsn" class="form-control" id="npsn" value="{{$profils->npsn}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" rows="4" required>{{$profils->alamat}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kontak</label>
                    <input type="number" name="kontak" class="form-control" id="kontak" value="{{$profils->kontak}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Visi Misi</label>
                    <textarea name="visi_misi" class="form-control" id="visi_misi" rows="4" required>{{$profils->visi_misi}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Berdiri</label>
                    <input type="number" class="form-control" name="tahun_berdiri" min="1900" max="{{date('Y')}}" id="tahun_berdiri" value="{{$profils->tahun_berdiri}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4">{{$profils->deskripsi}}</textarea>
                </div>
                <div class="mb3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('Admin.ps.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
    </div>
</div>

@endsection
