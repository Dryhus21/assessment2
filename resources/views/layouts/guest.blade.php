<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body>
    <div class="container">
        <div class="position-fixed top-0 end-0 p-3">
            <button type="button" class="btn btn-sm dark-mode-toggle" data-theme-toggle
                aria-label="Ubah tema tampilan">
                <i class="bi bi-moon-stars"></i>
            </button>
        </div>
        <div class="row justify-content-center align-items-center min-vh-100 py-4">
            <div class="col-sm-10 col-md-7 col-lg-5 col-xl-4">
                <div class="text-center mb-4">
                    <span class="auth-logo mb-2"><i class="bi bi-building">
                        </i>
                    </span>
                    <h5 class="fw-semibold mb-0">{{ config('app.name', 'CampusCare') }}
                    </h5>
                    <p class="text-muted small mb-0">Pengelolaan fasilitas kampus</p>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.scripts')
</body>

</html>