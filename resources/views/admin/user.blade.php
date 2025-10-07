@extends('admin.template')
@section('content')

{{-- ==================== CARD UTAMA ==================== --}}
<div class="card shadow p-2" style="background-color:#f1b434; border-radius:10px;">

    {{-- ==================== ALERT ERROR VALIDASI ==================== --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{-- Menampilkan semua pesan error dari validasi form --}}
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ==================== ALERT SUCCESS ==================== --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{-- Menampilkan pesan sukses setelah tambah, edit, atau hapus data --}}
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        {{-- ==================== HEADER DAN TOMBOL TAMBAH DATA ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Data User</h4>
            {{-- Tombol untuk menambah user baru --}}
            <a href="{{ route('Admin.user.create') }}" class="btn text-white" style="background-color:#001f3f;">
                <i class="fa fa-plus"></i> Tambah User
            </a>
        </div>

        {{-- ==================== TABEL DATA USER ==================== --}}
        <table class="table table-bordered table-hover align-middle">
            {{-- Judul kolom tabel --}}
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th width="160px">Aksi</th>
                </tr>
            </thead>

            {{-- Isi data user --}}
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        {{-- Kolom ID User --}}
                        <td class="text-center">{{ $user->id_user }}</td>

                        {{-- Kolom Username --}}
                        <td>{{ $user->username }}</td>

                        {{-- Kolom Role (misal: admin, operator, dsb) --}}
                        <td class="text-center">{{ $user->role }}</td>

                        {{-- Kolom Aksi: Edit dan Hapus --}}
                        <td class="text-center">

                            {{-- Tombol Edit: mengarah ke halaman edit user --}}
                            <a href="{{ route('Admin.user.edit', $user->id_user) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i> Edit
                            </a>

                            {{-- Tombol Hapus: menghapus data user setelah konfirmasi --}}
                            <form action="{{ route('Admin.user.delete', $user->id_user) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('GET')
                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">
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
