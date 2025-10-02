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
            <h4 class="mb-0 mt-0">Ekstrakulikuler</h4>
            <a href="{{route('Admin.ekskul.create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i>Tambah Ekskul</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Ekskul</th>
                    <th>Pembina</th>
                    <th>Jadwal Latihan</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ekskuls as $ekskul)
                <tr>
                    <td>{{$ekskul->id_ekskul}}</td>
                    <td>{{$ekskul->nama_ekskul}}</td>
                    <td>{{$ekskul->pembina}}</td>
                    <td>{{$ekskul->jadwal_latihan}}</td>
                    <td>{{Str::limit($ekskul->deskripsi,50,'...')}}</td>
                    <td><img src="{{asset('asset/image/'.$ekskul->gambar)}}" alt="file" style="height: 100px; object-fit: cover; width: 100%;"></td>
                    <td>
                        <a href="{{route('Admin.ekskul.edit',$ekskul->id_ekskul)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('Admin.ekskul.delete',$ekskul->id_ekskul)}}" method="POST" style="display: inline;">
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
