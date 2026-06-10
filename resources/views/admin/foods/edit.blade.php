@extends('admin.layouts.app')

@section('title', 'Edit Food')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9">
            <div class="module-card p-4">
                <h1 class="h4 mb-4">Edit Food</h1>

                <form action="{{ route('admin.foods.update', $food) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="name">Food Name</label>
                            <input class="form-control" id="name" name="name" value="{{ old('name', $food->name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="stall_id">Stall</label>
                            <select class="form-select" id="stall_id" name="stall_id">
                                <option value="">No stall selected</option>
                                @foreach ($stalls as $stall)
                                    <option value="{{ $stall->id }}" @selected((string) old('stall_id', $food->stall_id) === (string) $stall->id)>{{ $stall->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <label class="form-label" for="category">Category</label>
                            <input class="form-control" id="category" name="category" value="{{ old('category', $food->category) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="price">Price</label>
                            <input class="form-control" id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $food->price) }}" required>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $food->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="image">Food Image</label>
                        <div class="image-upload-box p-3">
                            <input class="form-control" id="image" name="image" type="file" accept="image/*">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.foods.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
