@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px">
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
            <h4 class="mb-0 mt-0">Berita</h4>
            <a href="{{route('Admin.berita.create')}}" class="btn btn-primary" >
                <i class="fa fa-plus"></i>Tambah Berita
            </a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $beritas as $berita )
                <tr>
                    <td>{{$berita->id_berita}}</td>
                    <td>{{$berita->judul}}</td>
                    <td>{{Str::limit($berita->isi,'50','...')}}</td>
                    <td>{{$berita->tanggal}}</td>
                    <td><img src="{{ asset('asset/image/' . $berita->gambar) }}" alt="Gambar Berita" width="100"></td>
                    <td>
                        <a href="{{route('Admin.berita.edit', $berita->id_berita)}}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{route('Admin.berita.delete', $berita->id_berita)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
