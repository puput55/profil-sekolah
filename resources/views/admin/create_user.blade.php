@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius 10px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-item-center mb-3">
            <h4 class="mb-0 mt-0">Tambah User</h4>
        </div>
                <div class="mb-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('succes'))
                        <div class="alert alert-success">
                            {{ session('succes') }}
                        </div>
                    @endif

                <form action="{{route('Admin.user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pasword</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-select" aria-label="Default select example" name="role" required>
                        <option selected disabled value="">Pilih role</option>
                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{route('Admin.user.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
    </div>
</div>
@endsection
