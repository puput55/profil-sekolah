@extends('admin.template')

@section('content')
<div class="card shadow p-3" style="background-color: #f1b434; border-radius: 10px;">

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
            <h4 class="mb-0 mt-0">Daftar Siswa</h4>
            <a href="{{ route('Admin.siswa.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Siswa
            </a>
        </div>

        {{-- Tabel Data Siswa --}}
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                    <th width="180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->id_siswa }}</td>
                    <td>{{ $siswa->nisn }}</td>
                    <td>{{ $siswa->nama_siswa }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->tahun_masuk }}</td>
                    <td>
                        {{-- Tombol Edit --}}
                        <a href="{{ route('Admin.siswa.edit', $siswa->id_siswa) }}"
                           class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i> Edit
                        </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('Admin.siswa.delete', $siswa->id_siswa) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('GET')
                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data siswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
