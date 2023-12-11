@extends('layout.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
        <div>
        <h2>Games</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Games</li>
            </ol>
        </nav>
        </div>
        <a href="{{ route('games.create') }}" class="btn btn-primary">
            Add Game
        </a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Publisher</th>
                        <th>Genre</th>
                        <th>Platform</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                    <tr>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->publisher }}</td>
                        <td>
                            @foreach ($game->genres as $genre)
                            <span class="bg-light p-1 border border-dark-subtle">{{ $genre->name }}</span>
                            @endforeach
                        </td>
                        <td>{{ $game->platform }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a class="btn btn-outline-primary" href="{{ route('games.show', $game->id) }}">Show</a>
                                <a class="btn btn-outline-success border-start-0" href="{{ route('games.edit', $game->id) }}">Edit</a>
                                <button type="button" class="btn btn-outline-danger border-start-0" data-bs-toggle="modal" data-bs-target="#delete-modal" onclick="bindingDelete({{ $game->id }})">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>

    <div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Game</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <div class="modal-body p-4">
                <div class="mb-3 text-center">
                    <svg class="mb-3" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                    <span class="fs-4 d-block">Are you sure you want to delete this game?</span>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary w-full">Yes</button>
                </div>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const table = new DataTable('#table');

        function bindingDelete(id) {
            $('#delete-form').attr('action', `{{ url('games') }}/${id}`)
        }

    </script>
@endpush