@extends('admin.template')

@section('content')

<div class="card shadow p-2" style="background-color:#f1b434; border-radius:10px;">

    {{-- ALERT ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ALERT SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">
        {{-- HEADER + TOMBOL TAMBAH PROFIL --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Profil Sekolah</h4>
            <a href="{{ route('Admin.ps.create') }}" class="btn text-white" style="background-color:#001f3f;">
                <i class="fa fa-plus"></i> Tambah Profil
            </a>
        </div>

        {{-- TABEL PROFIL SEKOLAH --}}
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
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
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profils as $profilSekolah)
                    <tr>
                        <td class="text-center">{{ $profilSekolah->id_profil }}</td>
                        <td>{{ $profilSekolah->nama_sekolah }}</td>
                        <td>{{ $profilSekolah->kepala_sekolah }}</td>
                        <td><img src="{{ asset('asset/image/'.$profilSekolah->foto) }}" width="80" height="80"></td>
                        <td><img src="{{ asset('asset/image/'.$profilSekolah->logo) }}" width="80" height="80"></td>
                        <td>{{ $profilSekolah->npsn }}</td>
                        <td>{{ Str::limit($profilSekolah->alamat, 20, '...') }}</td>
                        <td>{{ $profilSekolah->kontak }}</td>
                        <td>{{ Str::limit($profilSekolah->visi_misi, 30, '...') }}</td>
                        <td>{{ $profilSekolah->tahun_berdiri }}</td>
                        <td>{{ Str::limit($profilSekolah->deskripsi, 40, '...') }}</td>
                        <td class="text-center">
                            <a href="{{ route('Admin.ps.edit', $profilSekolah->id_profil) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
