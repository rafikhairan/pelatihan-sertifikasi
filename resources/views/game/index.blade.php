@extends('layout.app')

@section('content')
    <div class="mb-4">
        <h2>Tabel Game</h2>
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
                        <th>Name</th>
                        <th>Publisher</th>
                        <th>Genre</th>
                        <th>Platform</th>
                    </tr>
                </thead>
                <tbody>
                    
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