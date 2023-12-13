@extends('web.layout.app')

    @section('content')

    <!-- Header -->
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">My Rent</li>
            </ol>
        </nav>
        <div class="d-flex flex-row align-items-center mb-3">
            <h2>My Rent</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Game</th>
                    <th scope="col">Platform</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $rental->game->name }}</td>
                    <td>{{ $rental->game->platform->name }}</td>
                    <td>{{ date('d M Y', strtotime($rental->created_at)) }}</td>
                    <td><span class="{{ $rental->status === 'Approved' ? 'text-success' : ($rental->status === 'Returned' ? 'text-warning' : '') }}">{{ $rental->status }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection