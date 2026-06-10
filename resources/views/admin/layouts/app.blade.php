<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <div class="admin-brand">
                <div class="admin-brand-mark">
                    <i class="bi bi-shop"></i>
                </div>
                <div>
                    <p class="admin-brand-title">IIUM Stall Finder</p>
                    <p class="admin-brand-subtitle">Admin</p>
                </div>
            </div>

            <nav class="admin-nav">
                <a class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid-1x2"></i>
                    Dashboard
                </a>
                <a class="admin-nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="bi bi-people"></i>
                    Users
                </a>
                <a class="admin-nav-link {{ request()->routeIs('admin.stalls.*') ? 'active' : '' }}" href="{{ route('admin.stalls.index') }}">
                    <i class="bi bi-building-add"></i>
                    Stalls
                </a>
                <a class="admin-nav-link {{ request()->routeIs('admin.foods.*') ? 'active' : '' }}" href="{{ route('admin.foods.index') }}">
                    <i class="bi bi-egg-fried"></i>
                    Foods
                </a>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-topbar">
                <span>Hello, {{ auth()->user()->name }}!</span>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link text-secondary p-0" aria-label="Logout">
                        <i class="bi bi-box-arrow-right fs-5"></i>
                    </button>
                </form>
            </header>

            <section class="admin-content">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                @endif

                @include('admin.shared.errors')

                @yield('content')
            </section>
        </main>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
