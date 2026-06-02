<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <div class="display-1 text-danger fw-bold">403</div>
        <h2 class="mt-3">Akses Ditolak</h2>
        <p class="text-muted">
            Anda tidak memiliki izin untuk mengakses halaman ini.<br>
            Silakan hubungi administrator jika Anda merasa ini adalah kesalahan.
        </p>
        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">← Kembali</a>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Ke Halaman Utama</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
