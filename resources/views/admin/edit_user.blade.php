@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #f1b434; border-radius: 10px;">
    <div class="card-body">
        <div class="d-flex justify-conten-between align-item-center mb-3">
            <h4 class="mb-0 mt-0">Edit</h4>
        </div>
        <form action="{{route('Admin.user.update', $user->id_user)}} " method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" required>
                </div>
                <div class="mb-3 w-100">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Kosongkan jika tidak diubah" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="Admin"{{$user->role == 'Admin' ? 'selected' : ''}}>Admin</option>
                        <option value="Operator"{{$user->role == 'Operator' ? 'selected' : ''}}>Operator</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('Admin.user.index') }}" class="btn btn-secondary">Batal</a>
            </form>
    </div>
</div>
@endsection
