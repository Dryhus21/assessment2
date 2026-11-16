@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="card mb-4">
    <div class="card-body p-4">
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
            <div>
                <h4 class="mb-1">Selamat datang, {{ $user->name }}!</h4>
                <p class="text-muted mb-0 small">
                    Anda masuk sebagai
                    <span class="badge {{ $user->role->badgeClass() }}">{{ $user->role->label() }}
                    </span>.
                </p>
            </div>
            <i class="bi bi-building-check display-5 text-primary opacity-50"></i>
        </div>
    </div>
</div>
<div class="row g-3">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <span class="fs-4 text-primary"><i class="bi bi-building-gear"></i></span>
                    <h5 class="mb-0">Modul Fasilitas</h5>
                </div>
                <p class="text-muted small mb-3">Daftar fasilitas smartdrain.
                </p>
                @if (Route::has('fasilitas.index'))
                <a href="{{ route('fasilitas.index') }}" class="btn btn-sm btn-outline-primary">
                    Buka modul
                </a>
                @else
                <span class="badge text-bg-light border">Belum dibuat</span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <span class="fs-4 text-primary"><i class="bi bi-megaphone">
                        </i>
                    </span>
                    <h5 class="mb-0">Modul Pengaduan</h5>
                </div>
                <p class="text-muted small mb-3">Laporkan kerusakan fasilitas tanpa memuat ulang
                    halaman.</p>
                @if (Route: has('pengaduan.index'))
                <a href="{{ route('pengaduan.index') }}" class="btn btn-sm btn-outline-primary">
                    Buka modul
                </a>
                @else
                <span class="badge text-bg-light border">Belum dibuat</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection