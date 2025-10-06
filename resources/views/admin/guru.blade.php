@extends('admin.template')

@section('content')
<style>
    /* Styling tambahan untuk tabel guru */
    table {
        background-color: #001f3f;   /* Warna dasar tabel */
        color: #ffffff;              /* Warna teks putih */
    }
    table thead th {
        background-color: #003366;   /* Warna header tabel */
        color: #ffffff;
        text-align: center;
    }
    table tbody tr td {
        vertical-align: middle;
    }
</style>

<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">

    {{-- ==================== ALERT VALIDASI ERROR ==================== --}}
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

    {{-- ==================== ISI KONTEN ==================== --}}
    <div class="card-body">

        {{-- Judul + Tombol Tambah --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Data Guru</h4>
            <a href="{{ route('Admin.guru.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Guru
            </a>
        </div>

        {{-- Tabel Data Guru --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th>Nama Guru</th>
                        <th>NIP</th>
                        <th>Mata Pelajaran</th>
                        <th>Foto</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gurus as $guru)
                        <tr>
                            {{-- ID Guru --}}
                            <td class="text-center">{{ $guru->id_guru }}</td>

                            {{-- Nama Guru --}}
                            <td>{{ $guru->nama_guru }}</td>

                            {{-- NIP --}}
                            <td>{{ $guru->nip }}</td>

                            {{-- Mata Pelajaran --}}
                            <td>{{ $guru->mapel }}</td>

                            {{-- Foto --}}
                            <td class="text-center">
                                <img src="{{ asset('asset/image/' . $guru->foto) }}"
                                     alt="Foto Guru"
                                     class="img-thumbnail"
                                     style="width: 80px; height: 80px; object-fit: cover;">
                            </td>

                            {{-- Tombol Aksi --}}
                            <td class="text-center">
                                <a href="{{ route('Admin.guru.edit', $guru->id_guru) }}"
                                   class="btn btn-sm btn-warning">
                                   <i class="fa fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('Admin.guru.delete', $guru->id_guru) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('GET')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus guru ini?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data guru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
