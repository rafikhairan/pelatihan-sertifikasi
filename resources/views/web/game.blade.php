<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

    <!-- Header -->
    <div class="container py-4">
        <div class="d-flex flex-row align-items-center mb-3">
            <h2>{{ $game->name }}</h2>
            <div class="bg-secondary px-2 py-1 ms-3 text-white align-self-center">{{ $game->platform->name }}</div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3 rounded-0">
                    <div class="card-body pb-0">
                        <p>Publisher: {{ $game->publisher }}</p>
                        <p>Release Date: {{ $game->release_date }}</p>
                        <p>Tags: @if($game->genres) @foreach($game->genres as $genre) {{ $genre->name }} @endforeach @endif</p>
                    </div>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi tenetur praesentium illum blanditiis quos quas delectus, vero nesciunt placeat totam deserunt earum eos quisquam dolorem magni minima labore magnam reprehenderit provident odio! Vero, autem! Architecto deserunt eligendi libero tempora veniam error, ipsa voluptatum possimus quasi deleniti, iusto, dignissimos quia dolore sed quis asperiores sapiente! Cumque ad suscipit consequatur doloremque perspiciatis exercitationem sit cum mollitia magni tenetur rerum dolores impedit quasi, ipsam magnam reprehenderit ea! Tempora eligendi adipisci beatae facilis maiores hic iure sed eos unde quo temporibus odit, enim ratione qui praesentium cumque voluptatum. Sed facilis consectetur nulla officia velit!
                </p>
            </div>
            <div class="col-lg-4">
                <img class="img-header border-0 p-0 mb-3" src="{{ $game->photo ? asset('storage/uploads/' . $game->photo) : asset('assets/img/no-profile.png') }}">
                @if(!$isRented or $rentalStatus->status != 'Approved' and $rentalStatus->status != 'Requested')
                <form action="{{ route('rentals.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="game" value="{{ $game->id }}">
                    <button class="btn btn-primary w-100 mb-3" {{ $isRented ? 'disabled' : '' }}>{{ $isRented ? 'Request sent' : 'Rent' }}</button>
                </form>
                @endif
                @if($rentalStatus)
                    @if($rentalStatus->status == 'Approved' or $rentalStatus->status == 'Requested')
                    <form action="{{ route('rentals.update', $rentalStatus->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Requested">
                        <button class="btn btn-success w-100" {{ $rentalStatus->status == 'Requested' ? 'disabled' : '' }}>{{ $rentalStatus->status == 'Requested' ? 'Waiting for return approval' : 'Return' }}</button>
                    </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
    
    <script src="{{ asset('assets/vendor/jQuery-3.7.0/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables-1.13.8/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    @stack('scripts')
</body>