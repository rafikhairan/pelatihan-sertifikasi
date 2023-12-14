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
                    <th scope="col">No</th>
                    <th scope="col">Game</th>
                    <th scope="col">Platform</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Penalty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rental->game->name }}</td>
                    <td>{{ $rental->game->platform->name }}</td>
                    <td>{{ date('d M Y', strtotime($rental->created_at)) }}</td>
                    <td>
                        @if($rental->status == 'Approved')
                        <button type="button" class="btn btn-sm btn-outline-success ms-1" data-bs-toggle="modal" data-bs-target="#edit-modal" onclick="bindingUpdate({{ $rental->id }}, 'Requested')">Return</button>
                        @elseif($rental->status == 'Requested')
                        <button type="button" class="btn btn-sm btn-success ms-1" disabled>Waiting for return approval</button>
                        @else
                        <span class="{{ $rental->status === 'Returned' ? 'text-success' : ($rental->status === 'Pending' ? 'text-warning' : '') }}">{{ $rental->status }}</span>
                        @endif
                    </td>
                    <td>{{ $rental->penalty ? 'Rp' . number_format($rental->penalty, 0, ',' , '.') : '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="edit-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input id="statusInput" type="hidden" name="status" value="">
                <div class="modal-body px-4 pb-4 pt-3">
                <div class="mb-3 text-center">
                    <span class="fs-4 d-block">Send return request?</span>
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
        function bindingUpdate(id, status) {
            $('#edit-form').attr('action', `{{ url('rentals') }}/${id}`)
            $('#statusInput').attr('value', status)
        }
    </script>
    @endpush