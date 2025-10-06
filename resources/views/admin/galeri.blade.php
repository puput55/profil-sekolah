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

    <div class="card-body">
        {{-- Judul + Tombol Tambah Galeri --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Data Galeri</h4>
            <a href="{{ route('Admin.galeri.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Galeri
            </a>
        </div>

        {{-- Tabel Data Galeri --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
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
                <tbody>
                    @forelse ($galeris as $galeri)
                        <tr>
                            {{-- ID --}}
                            <td class="text-center">{{ $galeri->id_galeri }}</td>

                            {{-- Judul --}}
                            <td>{{ $galeri->judul }}</td>

                            {{-- Keterangan (dibatasi biar tidak terlalu panjang) --}}
                            <td>{{ Str::limit($galeri->keterangan, 50, '...') }}</td>

                            {{-- File Foto / Video --}}
                            <td class="text-center">
                                @if ($galeri->kategori == 'foto')
                                    <img src="{{ asset('asset/image/'.$galeri->file) }}"
                                         alt="Foto Galeri"
                                         class="img-thumbnail"
                                         style="width: 120px; height: 80px; object-fit: cover;">
                                @elseif ($galeri->kategori == 'video')
                                    <video width="150" height="90" controls>
                                        <source src="{{ asset('asset/image/'.$galeri->file) }}" type="video/mp4">
                                        Browser anda tidak mendukung tag video.
                                    </video>
                                @endif
                            </td>

                            {{-- Kategori --}}
                            <td class="text-center">
                                <span class="badge bg-{{ $galeri->kategori == 'foto' ? 'info' : 'danger' }}">
                                    {{ ucfirst($galeri->kategori) }}
                                </span>
                            </td>

                            {{-- Tanggal --}}
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}
                            </td>

                            {{-- Tombol Aksi --}}
                            <td class="text-center">
                                <a href="{{ route('Admin.galeri.edit', $galeri->id_galeri) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
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
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data galeri.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
