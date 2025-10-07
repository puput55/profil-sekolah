@extends('admin.template')

@section('content')

<div class="card shadow p-2" style="background-color:#f1b434; border-radius:10px;">

    {{-- ==================== ALERT ERROR VALIDASI ==================== --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ==================== ALERT SUCCESS ==================== --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        {{-- ========== HEADER + TOMBOL TAMBAH GURU ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Data Guru</h4>
            <a href="{{ route('Admin.guru.create') }}" class="btn text-white" style="background-color:#001f3f;">
                <i class="fa fa-plus"></i> Tambah Guru
            </a>
        </div>

        {{-- ========== TABEL DATA GURU ========== --}}
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Mata Pelajaran</th>
                    <th>Foto</th>
                    <th width="170px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gurus as $guru)
                    <tr>
                        <td class="text-center">{{ $guru->id_guru }}</td>
                        <td>{{ $guru->nama_guru }}</td>
                        <td>{{ $guru->nip }}</td>
                        <td>{{ $guru->mapel }}</td>
                        <td class="text-center">
                            <img src="{{ asset('asset/image/'.$guru->foto) }}" alt="Foto Guru" width="80" height="80">
                        </td>
                        <td class="text-center">
                            <a href="{{ route('Admin.guru.edit', $guru->id_guru) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('Admin.guru.delete', $guru->id_guru) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('GET')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
