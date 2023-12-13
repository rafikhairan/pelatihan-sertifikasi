@extends('web.layout.app')

    @section('content')

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

    @endsection