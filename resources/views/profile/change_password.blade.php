@extends('layout.app')

@section('content')
  <div class="mt-2 mb-3">
    <h2>Profile</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
      </ol>
    </nav>
  </div>
  @if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('failed') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <form action="{{ route('profile.updatePassword') }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="old-password" class="form-label">Old Password</label>
      <input type="password" class="form-control" id="old-password" name="old_password">
    </div>
    <div class="mb-3">
      <label for="new-password" class="form-label">New Password</label>
      <input type="password" class="form-control" id="new-password" name="new_password">
    </div>
    <div class="mb-4">
      <label for="confirm-password" class="form-label">Confirm New Password</label>
      <input type="password" class="form-control" id="confirm-password" name="confirm_password">
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
@endsection