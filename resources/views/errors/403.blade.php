<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 - Akses Ditolak</title>
    <script>
        (function() {
            var stored = localStorage.getItem('campuscare-theme');
            var theme = stored | (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' :
                'light');
            document.documentElement.setAttribute('data-bs-theme', theme);
        })();
    </script>
    <link href="https: cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f4f6fa;
        }

        [data-bs-theme="dark"] body {
            background: #0b1220;
        }
    </style>
</head>

<body>
    <div class="text-center p-4" style="max-width: 520px;">
        <div class="display-1 fw-bold text-primary">403</div>
        <h1 class="h4 mt-2">Akses Ditolak</h1>
        <p class="text-muted">
            {{ $exception->getMessage() ? 'Anda tidak memiliki hak akses ke halaman ini.' }}
        </p>
        <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left me-1">
                < i>
                    {{ auth()->check() ? 'Kembali ke Dashboard' : 'Masuk' }}
        </a>
    </div>
</body>

</html>