<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body>
    <nav class="navbar navbar-expand-lg app-navbar sticky-top py-2">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-semibold" href="{{ route('dashboard')
}}">
                <span class="brand-logo"><i class="bi bi-building"></i></span>
                {{ config('app.name', 'CampusCare') }}
            </a>
            <div class="d-flex align-items-center gap-2 ms-auto order-lg-3">
                <button type="button" class="btn btn-sm dark-mode-toggle" data-theme-toggle
                    aria-label="Ubah tema tampilan">
                    <i class="bi bi-moon-stars"></i>
                </button>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-2"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle">
                        </i>
                        <span class="d-none d-sm-inline">{{ auth()->user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="px-3 py-2 small">
                            <div class="fw-semibold">{{ auth()->user()->name }}</div>
                            <div class="text-muted">{{ auth()->user()->email }}</div>
                            <span class="badge {{ auth()->user()->role->badgeClass() }} mt-1">
                                {{ auth()->user()->role->label() }}
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"><i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"
                aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-lg-2" id="mainNavbar">
                <ul class="navbar-nav me-auto ms-lg-3 gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <i class="bi bi-house me-1"></i>Dashboard
                        </a>
                    </li>
                    @if (Route::has('fasilitas.index'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('fasilitas.*') ? 'active' : '' }}"
                            href="{{ route('fasilitas.index') }}">
                            <i class="bi bi-building-gear me-1"></i>Fasilitas
                        </a>
                    </li>
                    @endif
                    @if (Route::has('pengaduan.index'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}"
                            href="{{ route('pengaduan.index') }}">
                            <i class="bi bi-megaphone me-1"></i>Pengaduan
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->isAdmin() && Route::has('admin.users.index'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                            href="{{ route('admin.users.index') }}">
                            <i class="bi bi-people me-1"></i>Kelola User
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main class="container py-4">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible alert-autohide fade show d-flex align-itemscenter gap-2"
            role="alert">
            <i class="bi bi-check-circle"></i>
            <span>{{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2"
            role="alert">
            <i class="bi bi-exclamation-triangle"></i>
            <span>{{ session('error') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
        @endif
        @yield('content')
    </main>
    @include('layouts.partials.scripts')
</body>

</html>