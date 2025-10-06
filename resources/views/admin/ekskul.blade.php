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
        {{-- Judul + Tombol Tambah --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Data Ekstrakurikuler</h4>
            <a href="{{ route('Admin.ekskul.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Ekskul
            </a>
        </div>

        {{-- Tabel Data Ekskul --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Nama Ekskul</th>
                        <th>Pembina</th>
                        <th>Jadwal Latihan</th>
                        <th>Deskripsi</th>
                        <th width="200px">Gambar</th>
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ekskuls as $ekskul)
                        <tr>
                            {{-- ID --}}
                            <td class="text-center">{{ $ekskul->id_ekskul }}</td>

                            {{-- Nama Ekskul --}}
                            <td>{{ $ekskul->nama_ekskul }}</td>

                            {{-- Pembina --}}
                            <td>{{ $ekskul->pembina }}</td>

                            {{-- Jadwal --}}
                            <td>{{ $ekskul->jadwal_latihan }}</td>

                            {{-- Deskripsi singkat --}}
                            <td>{{ Str::limit($ekskul->deskripsi, 50, '...') }}</td>

                            {{-- Gambar --}}
                            <td class="text-center">
                                <img src="{{ asset('asset/image/'.$ekskul->gambar) }}"
                                     alt="{{ $ekskul->nama_ekskul }}"
                                     class="img-thumbnail"
                                     style="width: 120px; height: 100px; object-fit: cover;">
                            </td>

                            {{-- Tombol Aksi --}}
                            <td class="text-center">
                                <a href="{{ route('Admin.ekskul.edit', $ekskul->id_ekskul) }}"
                                   class="btn btn-sm btn-warning">
                                   <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('Admin.ekskul.delete', $ekskul->id_ekskul) }}"
                                      method="POST" style="display:inline;">
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
                            <td colspan="7" class="text-center text-muted">Belum ada data ekstrakurikuler.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
