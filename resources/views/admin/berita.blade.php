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
        {{-- HEADER + TOMBOL TAMBAH --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Data Berita</h4>
            <a href="{{ route('Admin.berita.create') }}" class="btn text-white" style="background-color:#001f3f;">
                <i class="fa fa-plus"></i> Tambah Berita
            </a>
        </div>

        {{-- TABEL BERITA --}}
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                    <th width="170px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $berita)
                    <tr>
                        <td class="text-center">{{ $berita->id_berita }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ Str::limit($berita->isi, 50, '...') }}</td>
                        <td>{{ $berita->tanggal }}</td>
                        <td class="text-center">
                            <img src="{{ asset('asset/image/'.$berita->gambar) }}" width="120" height="80">
                        </td>
                        <td class="text-center">
                            <a href="{{ route('Admin.berita.edit', $berita->id_berita) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('Admin.berita.delete', $berita->id_berita) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('GET')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
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
