@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">

        {{-- ==================== HEADER ==================== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 mt-0">Tambah User</h4>
        </div>

        {{-- ==================== ALERT ERROR ==================== --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> {{-- Menampilkan pesan error validasi --}}
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ==================== ALERT SUCCESS ==================== --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }} {{-- Menampilkan pesan sukses --}}
            </div>
        @endif

        {{-- ==================== FORM TAMBAH USER ==================== --}}
        <form action="{{ route('Admin.user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Token keamanan Laravel --}}

            {{-- Input Username --}}
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>

            {{-- Input Password --}}
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            {{-- Pilih Role --}}
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select class="form-select" name="role" required>
                    <option selected disabled value="">Pilih role</option>
                    <option value="Admin">Admin</option>
                    <option value="Operator">Operator</option>
                </select>
            </div>

            {{-- Tombol Submit & Batal --}}
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('Admin.user.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
