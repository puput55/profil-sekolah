@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Edit Siswa</h4>
        </div>
            <form action="{{route('Admin.siswa.update', $siswa->id_siswa)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="number" name="nisn" class="form-control" id="nisn" value="{{$siswa->nisn}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="{{$siswa->nama_siswa}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                        <option value="Laki-Laki"{{$siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                        <option value="Perempuan"{{$siswa->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Masuk</label>
                    <input type="text" name="tahun_masuk" class="form-control"  id="tahun_masuk" value="{{$siswa->tahun_masuk}}" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('Admin.siswa.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
    </div>
</div>
@endsection
