@extends('admin.template')

@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">

    {{-- ==================== ALERT VALIDASI ERROR ==================== --}}
    {{-- Menampilkan pesan error jika ada kesalahan input pada form --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                {{-- Menampilkan daftar error satu per satu --}}
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ==================== ALERT SUCCESS ==================== --}}
    {{-- Menampilkan pesan sukses setelah tambah, edit, atau hapus data --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            {{-- Tombol untuk menutup notifikasi --}}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        {{-- ==================== HEADER HALAMAN ==================== --}}
        {{-- Berisi judul halaman dan tombol untuk menambah galeri baru --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Data Galeri</h4>

            {{-- Tombol menuju halaman tambah galeri --}}
            <a href="{{ route('Admin.galeri.create') }}" class="btn text-white" style="background-color: #001f3f;">
                <i class="fa fa-plus"></i> Tambah Galeri
            </a>
        </div>

        {{-- ==================== TABEL DATA GALERI ==================== --}}
        {{-- Menampilkan daftar galeri dalam bentuk tabel --}}
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                {{-- Header kolom tabel --}}
                <thead class="table-dark text-center">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th width="200px">File</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>

                {{-- ==================== ISI DATA TABEL ==================== --}}
                <tbody>
                    {{-- Cek apakah ada data galeri --}}
                    @if(count($galeris) > 0)
                        {{-- Looping setiap data galeri --}}
                        @foreach ($galeris as $galeri)
                            <tr>
                                {{-- Kolom ID Galeri --}}
                                <td class="text-center">{{ $galeri->id_galeri }}</td>

                                {{-- Kolom Judul Galeri --}}
                                <td>{{ $galeri->judul }}</td>

                                {{-- Kolom Keterangan (dibatasi 50 karakter) --}}
                                <td>{{ Str::limit($galeri->keterangan, 50, '...') }}</td>

                                {{-- Kolom File: menampilkan foto atau video sesuai kategori --}}
                                <td class="text-center">
                                    @if ($galeri->kategori == 'foto')
                                        {{-- Menampilkan gambar jika kategori foto --}}
                                        <img src="{{ asset('asset/image/' . $galeri->file) }}"
                                            alt="Foto Galeri"
                                            class="img-thumbnail"
                                            style="width: 120px; height: 80px; object-fit: cover;">
                                    @elseif ($galeri->kategori == 'video')
                                        {{-- Menampilkan video jika kategori video --}}
                                        <video width="150" height="90" controls>
                                            <source src="{{ asset('asset/image/' . $galeri->file) }}" type="video/mp4">
                                            Browser anda tidak mendukung tag video.
                                        </video>
                                    @endif
                                </td>

                                {{-- Kolom Kategori dengan badge warna berbeda --}}
                                <td class="text-center">
                                    <span class="badge bg-{{ $galeri->kategori == 'foto' ? 'info' : 'danger' }}">
                                        {{ ucfirst($galeri->kategori) }}
                                    </span>
                                </td>

                                {{-- Kolom Tanggal --}}
                                <td>{{ $galeri->tanggal }}</td>

                                {{-- ==================== KOLOM AKSI ==================== --}}
                                {{-- Berisi tombol Edit dan Hapus --}}
                                <td class="text-center">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('Admin.galeri.edit', $galeri->id_galeri) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('Admin.galeri.delete', $galeri->id_galeri) }}"
                                        method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('GET')
                                        <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        {{-- Jika belum ada data galeri --}}
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data galeri.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
