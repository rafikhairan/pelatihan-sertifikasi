<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gameshark</title>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/extras.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/DataTables-1.13.8/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-black navbar-dark sticky-top py-4">
        <div class="container justify-content-between">
            <a href="/" class="navbar-brand">Gameshark</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->username }}
                    </a>
                    <!-- Here's the magic. Add the .animate and .slideIn classes to your .dropdown-menu and you're all set! -->
                    <div class="dropdown-menu position-absolute dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile') }}">Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Section -->
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
        <div class="d-flex flex-row align-items-center mb-3">
            <h2>Profile</h2>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3 rounded-0">
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}"  method="post" enctype="multipart/form-data">
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
                                <label for="photo" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                            </div>
                            <button class="btn btn-success rounded-0 w-100 py-2">Simpan</button> 
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <img class="img-thumbnail" src="{{ $user->photo ? asset('storage/uploads/' . $user->photo) : asset('assets/img/no-profile.png') }}">
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        const $photo = $('#photo');
        $photo.change(function(event) {
            const imageUrl = URL.createObjectURL(event.target.files[0])
            $('.img-thumbnail').attr('src', imageUrl)
        })
    </script>
    @endpush

    <script src="{{ asset('assets/vendor/jQuery-3.7.0/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables-1.13.8/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    @stack('scripts')
</body>