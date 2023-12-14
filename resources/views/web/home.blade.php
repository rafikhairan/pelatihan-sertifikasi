@extends('web.layout.app')

    @section('content')

    <!-- Header -->
    <header class="container pt-5">
        <div class="masthead text-white px-5">
            <h1>Gameshark</h1>
            <h3>Ribuan permainan dalam genggaman.</h3>
            <div class="row mt-3">
                <div class="col-lg-5 col-md-8">
                    <form class="d-flex" role="search" action="/">
                        <input class="form-control me-2 rounded-0" type="search" placeholder="Search" name="search" value="{{ request('search') }}" aria-label="Search">
                        <button class="btn btn-primary rounded-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Section -->
    <section class="py-4">
        <div class="container">
            <h6 class="text-uppercase">Top Featured</h6>
            <div class="row mb-2 mb-lg-4">
                @foreach($games as $game)
                <div class="col-md-6 col-lg-4 mb-3">
                    <a href="{{ route('games.show', $game->id) }}"><img class="img-product border-0 p-0" src="{{ $game->photo ? asset('storage/uploads/' . $game->photo) : asset('assets/img/disc.png') }}"></a>
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
    
    @endsection