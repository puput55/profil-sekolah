@extends('admin.template')
@section('content')
<div class="card shadow p-3" style="background-color: #f1b434; border-radius: 10px;">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (@session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Siswa</h4>
            <a href="{{route('Admin.siswa.create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i>Tambah Siswa</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                <tr>
                    <td>{{$siswa->id_siswa}}</td>
                    <td>{{$siswa->nisn}}</td>
                    <td>{{$siswa->nama_siswa}}</td>
                    <td>{{$siswa->jenis_kelamin}}</td>
                    <td>{{$siswa->tahun_masuk}}</td>
                    <td>
                        <a href="{{route('Admin.siswa.edit', $siswa->id_siswa)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('Admin.siswa.delete', $siswa->id_siswa)}}" method="POST" style="display: inline">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
