@extends('admin.template')
@section('content')
<style>
    table{
        background-color: #001f3f;
        text-decoration: #ffffff
    }
</style>
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
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
            <h4 class="mb-0 mt-0">Guru</h4>
            <a href="{{route('Admin.guru.create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i>Tambah Guru</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Guru</th>
                    <th>NIP</th>
                    <th>Mata Pelajaran</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $gurus as $guru )
                <tr>
                    <td>{{$guru->id_guru}}</td>
                    <td>{{$guru->nama_guru}}</td>
                    <td>{{$guru->nip}}</td>
                    <td>{{$guru->mapel}}</td>
                    <td><img src="{{asset('asset/image/'. $guru->foto)}}" alt="foto" width="100"></td>
                    <td>
                        <a href="{{route('Admin.guru.edit', $guru->id_guru)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('Admin.guru.delete', $guru->id_guru)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
