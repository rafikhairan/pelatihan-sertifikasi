@extends('web.layout.app')

@section('content')
    <div class="container py-4">
        <div>
            <h2>Users</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3 rounded-0">
                    <div class="card-body">
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
                                <input type="password" class="form-control" id="confirm-password" name="new_password_confirmation">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success rounded-0">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection