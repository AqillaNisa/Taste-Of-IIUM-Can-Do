<div class="table-responsive">
    <table class="table align-middle mb-0">
        <thead>
            <tr>
                <th>Image</th>
                <th>Stall Name</th>
                <th>Menu</th>
                <th>Mahallah</th>
                <th>Opening Hours</th>
                <th>Type of Food</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stalls as $stall)
                <tr>
                    <td>
                        @if ($stall->image_path)
                            <img class="table-thumb" src="{{ asset('storage/'.$stall->image_path) }}" alt="{{ $stall->name }}">
                        @else
                            <div class="table-thumb d-grid place-items-center"></div>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $stall->name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($stall->menu_items, 28) }}</td>
                    <td><span class="badge text-bg-info">{{ $stall->mahallah }}</span></td>
                    <td><span class="badge text-bg-primary">{{ $stall->opening_hours }}</span></td>
                    <td><span class="badge text-bg-success">{{ $stall->food_type }}</span></td>
                    <td class="text-end">
                        <a class="btn btn-link text-secondary p-1" href="{{ route('admin.stalls.edit', $stall) }}" aria-label="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('admin.stalls.destroy', $stall) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this stall?')">
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
                    <td colspan="7" class="text-center text-muted py-4">No stalls yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
