@extends('web.layout.app')

    @section('content')

    <!-- Header -->
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $game->name }}</li>
            </ol>
        </nav>
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
                        <p>Tags: @if($game->genres) @foreach($game->genres as $genre) <a href="/">{{ $genre->name }}</a>, @endforeach @endif</p>
                    </div>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi tenetur praesentium illum blanditiis quos quas delectus, vero nesciunt placeat totam deserunt earum eos quisquam dolorem magni minima labore magnam reprehenderit provident odio! Vero, autem! Architecto deserunt eligendi libero tempora veniam error, ipsa voluptatum possimus quasi deleniti, iusto, dignissimos quia dolore sed quis asperiores sapiente! Cumque ad suscipit consequatur doloremque perspiciatis exercitationem sit cum mollitia magni tenetur rerum dolores impedit quasi, ipsam magnam reprehenderit ea! Tempora eligendi adipisci beatae facilis maiores hic iure sed eos unde quo temporibus odit, enim ratione qui praesentium cumque voluptatum. Sed facilis consectetur nulla officia velit!
                </p>
            </div>
            <div class="col-lg-4">
                <img class="img-header border-0 p-0 mb-3" src="{{ $game->photo ? asset('storage/uploads/' . $game->photo) : asset('assets/img/disc.png') }}">
                @if(!$isRented or $rentalStatus->status != 'Approved' and $rentalStatus->status != 'Requested')
                <form action="{{ route('rentals.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="game" value="{{ $game->id }}">
                    <button class="btn btn-primary w-100 mb-3" {{ $rentalCount >= 2 ? 'disabled' : ($isRented ? 'disabled' : '') }}>{{ $isRented ? 'Request sent' : 'Rent' }}</button>
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

    @endsection