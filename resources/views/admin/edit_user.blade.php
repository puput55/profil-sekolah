@extends('admin.template')
@section('content')

<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit User</h4>
        </div>

        {{-- ==================== FORM EDIT USER ==================== --}}
        <form action="{{ route('Admin.user.update', $user->id_user) }}" method="POST">
            @csrf
            {{-- Username --}}
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text"
                       name="username"
                       id="username"
                       class="form-control"
                       value="{{ $user->username }}"
                       required>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                       name="password"
                       id="password"
                       class="form-control"
                       placeholder="Kosongkan jika tidak diubah">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti password.</small>
            </div>

            {{-- Role --}}
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Operator" {{ $user->role == 'Operator' ? 'selected' : '' }}>Operator</option>
                </select>
            </div>

            {{-- Tombol Aksi --}}
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Update
            </button>
            <a href="{{ route('Admin.user.index') }}" class="btn btn-secondary">
                <i class="fa fa-times"></i> Batal
            </a>
        </form>
    </div>
</div>
@endsection
