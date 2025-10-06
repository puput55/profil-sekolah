@extends('admin.template')

@section('content')
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
            <h4 class="mb-0">Profil Sekolah</h4>
            <a href="{{ route('Admin.ps.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>

        {{-- Tabel Data Profil Sekolah --}}
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
                @forelse ($profils as $profilSekolah)
                <tr>
                    {{-- ID --}}
                    <td class="text-center">{{ $profilSekolah->id_profil }}</td>

                    {{-- Nama Sekolah --}}
                    <td>{{ $profilSekolah->nama_sekolah }}</td>

                    {{-- Kepala Sekolah --}}
                    <td>{{ $profilSekolah->kepala_sekolah }}</td>

                    {{-- Foto Kepala Sekolah --}}
                    <td>
                        <img src="{{ asset('asset/image/' . $profilSekolah->foto) }}"
                             alt="Foto Kepala Sekolah"
                             class="img-thumbnail"
                             style="height: 80px; width: 80px; object-fit: cover;">
                    </td>

                    {{-- Logo Sekolah --}}
                    <td>
                        <img src="{{ asset('asset/image/' . $profilSekolah->logo) }}"
                             alt="Logo Sekolah"
                             class="img-thumbnail"
                             style="height: 80px; width: 80px; object-fit: cover;">
                    </td>

                    {{-- NPSN --}}
                    <td>{{ $profilSekolah->npsn }}</td>

                    {{-- Alamat --}}
                    <td>{{ Str::limit($profilSekolah->alamat, 20, '...') }}</td>

                    {{-- Kontak --}}
                    <td>{{ $profilSekolah->kontak }}</td>

                    {{-- Visi Misi --}}
                    <td>{{ Str::limit($profilSekolah->visi_misi, 30, '...') }}</td>

                    {{-- Tahun Berdiri --}}
                    <td>{{ $profilSekolah->tahun_berdiri }}</td>

                    {{-- Deskripsi --}}
                    <td>{{ Str::limit($profilSekolah->deskripsi, 40, '...') }}</td>

                    {{-- Aksi --}}
                    <td class="text-center">
                        <a href="{{ route('Admin.ps.edit', $profilSekolah->id_profil) }}"
                           class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center text-muted">Belum ada data profil sekolah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
