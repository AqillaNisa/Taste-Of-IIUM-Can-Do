@extends('admin.layouts.app')

@section('title', 'Edit Stall')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9">
            <div class="module-card p-4">
                <h1 class="h4 mb-4">Edit Stall</h1>

                <form action="{{ route('admin.stalls.update', $stall) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="name">Stall Name</label>
                        <input class="form-control" id="name" name="name" value="{{ old('name', $stall->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="menu_items">Menu Items</label>
                        <textarea class="form-control" id="menu_items" name="menu_items" rows="4">{{ old('menu_items', $stall->menu_items) }}</textarea>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="opening_hours">Opening Hours</label>
                            <input class="form-control" id="opening_hours" name="opening_hours" value="{{ old('opening_hours', $stall->opening_hours) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="food_type">Type of Food</label>
                            <input class="form-control" id="food_type" name="food_type" value="{{ old('food_type', $stall->food_type) }}" required>
                        </div>
                    </div>

                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <label class="form-label" for="mahallah">Mahallah</label>
                            <input class="form-control" id="mahallah" name="mahallah" value="{{ old('mahallah', $stall->mahallah) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="image">Stall Image</label>
                            <div class="image-upload-box p-3">
                                <input class="form-control" id="image" name="image" type="file" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.stalls.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
