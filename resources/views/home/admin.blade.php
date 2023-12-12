@extends('layout.app')

@section('content')
    <h2 class="mt-2 mb-3">Dashboard</h2>
    <div class="col-lg-12 col-xl-12 pt-3">
        <div class="row gx-4">
            <div class="col-md-4 mb-3">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="fw-bold">Total User</div>
                        <div class="">{{ $userCount }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="fw-bold">Total Admin</div>
                        <div class="">{{ $adminCount }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="fw-bold">Total Game</div>
                        <div class="">{{ $gameCount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection