@extends('layout.app')

@section('content')
  <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
    <div>
      <h2>Profile</h2>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>
    </div>
    <a class="btn btn-primary" href="{{ route('profile.changePassword') }}">Change Password</a>
  </div>
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <div class="row gx-5">
    <div class="col-8">
      <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Photo</label>
          <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
        </div>
        <div class="mb-4">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" name="address" rows="4">{{ $user->address }}</textarea>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
    <div class="col-4 mt-4 pt-2">
      <img src="{{ $user->photo ? asset('storage/uploads/' . $user->photo) : asset('assets/img/no-profile.png') }}" class="img-thumbnail" alt="...">
    </div>
  </div>
@endsection