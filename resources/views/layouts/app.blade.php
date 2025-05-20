<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('index.css') }}">
</head>

<body>
    <div class="topbar d-flex justify-content-between align-items-center px-3 py-2 bg-dark text-white">
        <h5 class="mb-0">Admin Dashboard</h5>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4 me-2"></i>
                <span class="d-none d-md-inline">Admin</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn"
                aria-labelledby="adminDropdown">
                <li>
                    <form method="POST" action="/">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar d-none d-md-block">
        <a href="{{ route('dashboard.admin') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="/" class="{{ Request::is('users*') ? 'active' : '' }}">
            <i class="fas fa-users me-2"></i> Users
        </a>
        <a href="/" class="{{ Request::is('products*') ? 'active' : '' }}">
            <i class="fas fa-box-open me-2"></i> Products
        </a>
        <a href="/" class="{{ Request::is('orders*') ? 'active' : '' }}">
            <i class="fas fa-shopping-cart me-2"></i> Orders
        </a>
        <a href="/" class="{{ Request::is('settings*') ? 'active' : '' }}">
            <i class="fas fa-cog me-2"></i> Settings
        </a>
    </div>

    <div class="main-content">
        <div class="container-fluid mt-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#form-author').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/api/authors',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: xhr.responseJSON.message || 'Terjadi kesalahan'
                    });
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
