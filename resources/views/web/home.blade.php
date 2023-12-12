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
    <header class="container pt-4">
        <div class="masthead text-white px-5">
            <h1>Gameshark</h1>
            <h3>Ribuan permainan dalam genggaman.</h3>
        </div>
    </header>

    <!-- Section -->
    <section class="py-4">
        <div class="container">
            <h6 class="text-uppercase">Top Featured</h6>
            <div class="row mb-2 mb-lg-4">
                @foreach($games as $game)
                <div class="col-md-6 col-lg-4 mb-3">
                    <a href="{{ route('games.show', $game->id) }}"><img class="img-product border-0 p-0" src="{{ $game->photo ? asset('storage/uploads/' . $game->photo) : asset('assets/img/no-profile.png') }}"></a>
                    <div class="bg-black p-3">
                        <a href="{{ route('games.show', $game->id) }}" class="h5 text-white text-decoration-none text-truncate mb-0">{{ $game->name }}</a>
                        <div class="text-white">
                            {{ $game->platform ? $game->platform->name : '' }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <script src="{{ asset('assets/vendor/jQuery-3.7.0/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables-1.13.8/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    @stack('scripts')
</body>