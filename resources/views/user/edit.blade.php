@extends('layout.app')

@section('content')
  <div class="mt-2 mb-3">
      <h2>Users</h2>
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit User</li>
          </ol>
      </nav>
  </div>
  @if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('failed') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <div class="row gx-5">
    <div class="col-8">
      <form action="{{ route('users.update', $user->username) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" id="role" name="role">
            <option value="1">Admin</option>
            <option value="0">User</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Photo</label>
          <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">New Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-4">
          <label for="confirm-password" class="form-label">Confirm New Password</label>
          <input type="password" class="form-control" id="confirm-password" name="confirm_password">
        </div>
        <div class="mb-4">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" name="address" rows="4">{{ old('address', $user->address) }}</textarea>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
    <div class="col-4 mt-4 pt-2">
      <img src="{{ asset('assets/img/no-profile.png') }}" class="img-thumbnail" alt="Photo">
    </div>
  </div>
@endsection

@push('scripts')
    <script>
        const $photo = $('#photo');
        $photo.change(function(event) {
            const imageUrl = URL.createObjectURL(event.target.files[0])
            $('.img-thumbnail').attr('src', imageUrl)
        })
    </script>
@endpush