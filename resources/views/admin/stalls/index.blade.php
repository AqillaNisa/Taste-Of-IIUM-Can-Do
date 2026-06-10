@extends('admin.layouts.app')

@section('title', 'Stall Directory')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">All Stall Directory</h1>
            <p class="text-muted mb-0">View and register food stalls around IIUM.</p>
        </div>
        <a href="{{ route('admin.stalls.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Add Stall
        </a>
    </div>

    <div class="module-card p-4">
        @include('admin.stalls.partials.table', ['stalls' => $stalls])
    </div>

    <div class="mt-3">
        {{ $stalls->links() }}
    </div>
@endsection
