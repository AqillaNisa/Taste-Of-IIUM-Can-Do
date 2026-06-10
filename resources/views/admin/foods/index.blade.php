@extends('admin.layouts.app')

@section('title', 'Foods')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Foods</h1>
            <p class="text-muted mb-0">Manage food items attached to stalls.</p>
        </div>
        <a href="{{ route('admin.foods.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Add Food
        </a>
    </div>

    <div class="module-card p-4">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Food Name</th>
                        <th>Stall</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($foods as $food)
                        <tr>
                <td>
    @if ($food->image_path)
        <img class="table-thumb" 
             src="{{ asset('/assets/img/foodpic/stalls/' . basename($food->image_path)) }}" 
             alt="{{ $food->name }}" 
             style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
    @else
        <div class="table-thumb" 
             style="width: 50px; height: 50px; background-color: #e9ecef; border-radius: 5px;">
        </div>
    @endif
</td>
                            <td class="fw-semibold">{{ $food->name }}</td>
                            <td>{{ $food->stall?->name ?? 'No stall' }}</td>
                            <td><span class="badge text-bg-success">{{ $food->category }}</span></td>
                            <td>RM {{ number_format((float) $food->price, 2) }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($food->description, 36) }}</td>
                            <td class="text-end">
                                <a class="btn btn-link text-secondary p-1" href="{{ route('admin.foods.edit', $food) }}" aria-label="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.foods.destroy', $food) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this food item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link text-secondary p-1" type="submit" aria-label="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No food items yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $foods->links() }}
    </div>
@endsection
