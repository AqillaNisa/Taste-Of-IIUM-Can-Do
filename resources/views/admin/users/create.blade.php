@extends('admin.layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8">
            <div class="module-card p-4">
                <h1 class="h4 mb-4">Create User</h1>

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" id="password" type="password" name="password" required>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" id="is_admin" type="checkbox" name="is_admin" value="1" @checked(old('is_admin'))>
                        <label class="form-check-label" for="is_admin">Make this user an admin</label>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
