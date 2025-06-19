<!DOCTYPE html>
<html lang="en">
<head>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/backend/admin.css') }}">
</head>
<body>
    <div class="d-flex min-vh-100">
        <div class="sidebar min-vh-100 p-3 bg-light" style="width: 250px;">
            <div class="header-sidebar mb-4 mt-4">
                <h4>Admin</h4>
                <p>Database</p>
            </div>
            <div class="sidebar nav flex-column nav-pills">
                <a href="{{ route('backend.beranda') }}" class="nav-link custom-nav-link {{ request()->routeIs('backend.beranda') ? 'active' : '' }}">
                    <i class="bi bi-house-door-fill"></i> Beranda
                </a>
                <a href="{{ route('backend.user.index') }}"  class="nav-link custom-nav-link {{ request()->routeIs('backend.user.index') ? 'active' : '' }}">
                    <i class="bi bi-person-fill"></i> User
                </a>
                <a href="{{ route('backend.pasien.index') }}" class="nav-link custom-nav-link {{ request()->routeIs('backend.pasien.index') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Pasien
                </a>
                <hr>
                <a href="{{ route('backend.user.trashed') }}" class="nav-link custom-nav-link {{ request()->routeIs('backend.user.trashed') ? 'active' : '' }}">
                    <i class="bi bi-trash-fill"></i> User Trashed
                </a>
                <a href="{{ route('backend.pasien.trashed') }}" class="nav-link custom-nav-link {{ request()->routeIs('backend.pasien.trashed') ? 'active' : '' }}">
                    <i class="bi bi-trash-fill"></i> Pasien Trashed
                </a>
                
                <hr> 
                <a href="#" class="nav-link custom-nav-link text-danger" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <div class="right-content flex-fill p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>
</html>