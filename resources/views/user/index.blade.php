@extends('layout.app')

@section('content')
    <div class="mb-4">
        <h2>Tabel User</h2>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->is_admin ? 'User' : 'Admin' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>
@endsection

@push('scripts')
    <script>
        const table = new DataTable('#table')
    </script>
@endpush