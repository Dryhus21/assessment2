@extends('layouts.guest')
@section('title', 'Daftar')
@section('content')
<h1 class="h5 fw-semibold mb-1">Buat akun mahasiswa</h1>
<p class="text-muted small mb-4">Akun hasil pendaftaran otomatis berperan sebagai mahasiswa.</p>
<form method="POST" action="{{ route('register.store') }}" novalidate>
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"
            class="form-control @error('name') is-invalid @enderror"
            autocomplete="name" autofocus required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
            class="form-control @error('email') is-invalid @enderror"
            autocomplete="username" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <input type="password" id="password" name="password"
                class="form-control border-end-0 @error('password') is-invalid @enderror"
                autocomplete="new-password" required>
            <button class="btn btn-outline-secondary border-start-0" type="button"
                data-toggle-password="password" aria-label="Tampilkan password">
                <i class="bi bi-eye"></i>
            </button>
        </div>
        @error('password')
        <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
        <div class="form-text">Minimal 8 karakter.</div>
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Konfirmasi password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
            class="form-control" autocomplete="new-password" required>
        < div>
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-person-plus me-1"></i>Daftar
            </button>
</form>
<p class="text-center small text-muted mt-3 mb-0">
    Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
</p>
@endsection