@extends('layout.app')

@section('content')
    <div class="mb-4">
        <h2>Rental List</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel User</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>User name</th>
                        <th>Game name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $rental)
                    <tr>
                        <td>{{ $rental->user->name }}</td>
                        <td>{{ $rental->game->name }}</td>
                        <td>{{ $rental->status }}</td>
                        <td>
                            @if($rental->status == 'Pending' or $rental->status == 'Requested')
                            <button type="button" class="btn badge text-bg-primary ms-1" data-bs-toggle="modal" data-bs-target="#edit-modal" onclick="bindingUpdate({{ $rental->id }}, @if($rental->status == 'Pending') 'Approved' @else 'Returned' @endif)">Approve</button>
                            @elseif($rental->status == 'Approved')
                            <button type="button" class="btn badge text-bg-success ms-1" data-bs-toggle="modal" data-bs-target="#edit-modal" onclick="bindingUpdate({{ $rental->id }}, 'Returned')">Return</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
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
                    <span class="fs-4 d-block">Approve this request?</span>
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

        function bindingUpdate(id, status) {
            $('#edit-form').attr('action', `{{ url('rentals') }}/${id}`)
            $('#statusInput').attr('value', status)
        }
    </script>
@endpush