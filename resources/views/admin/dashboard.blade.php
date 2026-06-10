@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Dashboard</h1>
            <p class="text-muted mb-0">Manage users, stalls, and food items.</p>
        </div>
        <a href="{{ route('admin.stalls.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Add Stall
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <i class="bi bi-people mb-3"></i>
                <p class="text-muted mb-1">Users</p>
                <h2 class="h3 mb-0">{{ $userCount }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <i class="bi bi-shop mb-3"></i>
                <p class="text-muted mb-1">Stalls</p>
                <h2 class="h3 mb-0">{{ $stallCount }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <i class="bi bi-egg-fried mb-3"></i>
                <p class="text-muted mb-1">Foods</p>
                <h2 class="h3 mb-0">{{ $foodCount }}</h2>
            </div>
        </div>
    </div>

    <div class="module-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h5 mb-0">Recent Stalls</h2>
            <a href="{{ route('admin.stalls.index') }}" class="btn btn-outline-secondary btn-sm">View All</a>
        </div>

        @include('admin.stalls.partials.table', ['stalls' => $recentStalls])
    </div>
@endsection
