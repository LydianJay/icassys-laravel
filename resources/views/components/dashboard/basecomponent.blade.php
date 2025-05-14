<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>icastetuan</title>
    <link rel="shortcut icon" href="{{ asset('assets/school_content/admin_small_logo/1.png') }}" type="image/x-icon">

    <!-- Bootstrap + Font Awesome -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" />

    <style>
        body {
            background-color: #f1f3f9;
        }

        .bg-skin-blue {
            background-color: #002147 !important;
        }

        .sidebar {
            min-height: 100vh;
            border-right: 1px solid #dee2e6;
        }

        .sidebar .list-group-item {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
        }

        .sidebar .list-group-item:hover,
        .sidebar .list-group-item.active {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        .sidebar .submenu .list-group-item {
            padding-left: 1.5rem;
            background-color: #003366;
            border-radius: 4px;
        }

        .sidebar a {
            color: white;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .dashboard-card {
            border: 1px solid #dee2e6;
            border-radius: 12px;
            background-color: white;
            padding: 1.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        }

        .navbar .btn-logout {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
        }

        .navbar .btn-logout:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }
    </style>
</head>

<body>
    <div class="container-fluid px-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg sticky-top bg-skin-blue shadow-sm px-3">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/school_content/admin_logo/1.png') }}" alt="logo" style="width: 40px;">
                <h5 class="text-white mb-0 ms-3">{{ config('app.app_title') }}</h5>
            </div>
            <div class="ms-auto d-flex align-items-center">
                <!-- Logout Button -->
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="btn btn-logout me-2">
                        <i class="fa fa-sign-out-alt me-1"></i> Sign Out
                    </button>
                </form>
                <!-- Mobile Toggle -->
                <button class="btn btn-outline-light d-lg-none" id="sidebarToggle">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </nav>

        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 bg-skin-blue sidebar d-none d-md-block" id="sidebar">
                <ul class="list-group p-3">
                    @foreach (config('menu') as $key => $menu)
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#submenu{{ $key }}">
                            <span><i class="{{ $menu['icon'] }} me-2"></i> {{ $menu['menu'] }}</span>
                            <i class="fa fa-angle-left" id="icon-item-{{ $key }}"></i>
                        </li>
                        @if(!empty($menu['submenu']))
                            <ul class="list-group collapse submenu my-1" id="submenu{{ $key }}">
                                @foreach ($menu['submenu'] as $subKey => $item)
                                    <li class="list-group-item my-1">
                                        <a href="{{ route($item['route']) }}" class="text-decoration-none">{{ $subKey }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col px-4 py-4">
                <div class="dashboard-card">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');

            sidebarToggle?.addEventListener('click', function () {
                sidebar.classList.toggle('d-none');
            });

            @foreach (config('menu') as $key => $menu)
                const submenu{{$key}} = document.getElementById("submenu{{ $key }}");
                submenu{{$key}}?.addEventListener('hide.bs.collapse', () => {
                    document.getElementById('icon-item-{{ $key }}').classList.replace('fa-angle-down', 'fa-angle-left');
                });
                submenu{{$key}}?.addEventListener('show.bs.collapse', () => {
                    document.getElementById('icon-item-{{ $key }}').classList.replace('fa-angle-left', 'fa-angle-down');
                });
            @endforeach
        });
    </script>
</body>

</html>