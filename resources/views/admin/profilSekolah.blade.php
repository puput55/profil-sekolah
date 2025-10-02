@extends('admin.template')
@section('content')
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
            <h4 class="mb-0 mt-0">Profil Sekolah</h4>
            <a href="{{route('Admin.ps.create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i>Tambah</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Sekolah</th>
                    <th>Kepala Sekolah</th>
                    <th>Foto</th>
                    <th>Logo</th>
                    <th>NPSN</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Visi Misi</th>
                    <th>Tahun Berdiri</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profils as $profilSekolah)
                <tr>
                    <td>{{$profilSekolah->id_profil}}</td>
                    <td>{{$profilSekolah->nama_sekolah}}</td>
                    <td>{{$profilSekolah->kepala_sekolah}}</td>
                    <td><img src="{{ asset('asset/image/' . $profilSekolah->foto) }}" alt="" style="height: 100px; object-fit: cover; width: 100%;"></td>
                    <td><img src="{{ asset('asset/image/' . $profilSekolah->logo) }}" alt="" style="height: 100px; object-fit: cover; width: 100%;"></td>
                    <td>{{$profilSekolah->npsn}}</td>
                    <td>{{Str::limit($profilSekolah->alamat,10,'...')}}</td>
                    <td>{{$profilSekolah->kontak}}</td>
                    <td>{{Str::limit($profilSekolah->visi_misi,20,'...')}}</td>
                    <td>{{$profilSekolah->tahun_berdiri}}</td>
                    <th>{{Str::limit($profilSekolah->deskripsi,20,'...')}}</th>
                    <td><a href="{{ route('Admin.ps.edit', $profilSekolah->id_profil) }}" class="btn btn-sm btn-warning">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
