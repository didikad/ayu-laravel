@extends('layout.maindash')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Admin</h1>
    </div>

    <form action="{{ route('admin.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
        </div>

        <!-- Peran (Name) -->
        <div class="mb-3">
            <label for="name" class="form-label">Peran</label>
            <select class="form-control" id="name" name="name" required>
                <option value="admin" {{ $admin->name == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="superadmin" {{ $admin->name == 'superadmin' ? 'selected' : '' }}>SuperAdmin</option>
            </select>
        </div>

        <!-- Password Baru dan Konfirmasi Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
