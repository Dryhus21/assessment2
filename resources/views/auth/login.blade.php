@extends('layouts.guest')
@section('title', 'Masuk')
@section('content')
<h1 class="h5 fw-semibold mb-1">Masuk ke SmartDrain</h1>
<p class="text-muted small mb-4">Gunakan akun admin atau warga yang sudah terdaftar.</p>
<form method="POST" action="{{ route('login.store') }}" novalidate>
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
            class="form-control @error('email') is-invalid @enderror"
            autocomplete="username" autofocus required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <input type="password" id="password" name="password"
                class="form-control border-end-0 @error('password') is-invalid @enderror"
                autocomplete="current-password" required>
            <button class="btn btn-outline-secondary border-start-0" type="button"
                data-toggle-password="password" aria-label="Tampilkan password">
                <i class="bi bi-eye"></i>
            </button>
        </div>
        @error('password')
        <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
        <label class="form-check-label small" for="remember">Ingat saya</label>
    </div>
    <button type="submit" class="btn btn-primary w-100">
        <i class="bi bi-box-arrow-in-right me-1"></i>Masuk
    </button>
</form>
<p class="text-center small text-muted mt-3 mb-0">
    Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
</p>
@endsection