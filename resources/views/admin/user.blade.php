@extends('admin.template')

@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">

    {{-- ==================== VALIDASI ERROR ==================== --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ==================== FLASH MESSAGE SUCCESS ==================== --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">
        {{-- ==================== HEADER & TOMBOL TAMBAH ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Manajemen User</h4>
            <a href="{{ route('Admin.user.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah User
            </a>
        </div>

        {{-- ==================== TABEL USER ==================== --}}
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    {{-- <th>Password</th> --}} {{-- Sembunyikan password demi keamanan --}}
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        {{-- ID User --}}
                        <td class="text-center">{{ $user->id_user }}</td>

                        {{-- Username --}}
                        <td>{{ $user->username }}</td>

                        {{-- Role User --}}
                        <td class="text-center">{{ $user->role }}</td>

                        {{-- Tombol Edit & Delete --}}
                        <td class="text-center">
                            <a href="{{ route('Admin.user.edit', $user->id_user) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('Admin.user.delete', $user->id_user) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('GET')
                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    {{-- Jika data user kosong --}}
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada data user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
