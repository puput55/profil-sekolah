@extends('admin.template')
@section('content')
<div class="card show p-2" style="background-color: #f1b434; border-radius: 10px;">
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
            <h4 class="mb-0 mt-0">Galeri</h4>
            <a href="{{route('Admin.galeri.create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i>Tambah Galeri</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>File</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galeris as $galeri)
                <tr>
                    <td>{{$galeri->id_galeri}}</td>
                    <td>{{$galeri->judul}}</td>
                    <td>{{$galeri->keterangan}}</td>
                    <td>
                        @if ($galeri->kategori == 'foto')
                            <img src="{{ asset('asset/image/'.$galeri->file) }}" alt="foto" width="100">
                        @elseif ($galeri->kategori == 'video')
                            <video width="150" controls>
                                <source src="{{ asset('asset/image/'.$galeri->file) }}" type="video/mp4">
                                Browser anda tidak mendukung tag video.
                            </video>
                        @endif
                    </td>
                    <td>{{$galeri->kategori}}</td>
                    <td>{{$galeri->tanggal}}</td>
                    <td>
                        <a href="{{route('Admin.galeri.edit',$galeri->id_galeri)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('Admin.galeri.delete',$galeri->id_galeri)}}" method="POST" style="display: inline;">
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
