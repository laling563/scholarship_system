<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - PSU Scholarship System')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Asdmin CSS -->
    <style>
        :root {
            --admin-primary: #2c3e50;
            --admin-secondary: #34495e;
            --admin-accent: #3498db;
            --admin-light: #ecf0f1;
            --admin-danger: #e74c3c;
            --admin-success: #2ecc71;
            --admin-warning: #f39c12;
            --admin-info: #3498db;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styles */
        .admin-sidebar {
            background: var(--admin-primary);
            color: white;
            height: 100vh;
            position: fixed;
            transition: all 0.3s;
            width: 250px;
            z-index: 1000;
        }

        .admin-sidebar .sidebar-header {
            padding: 20px;
            background: var(--admin-secondary);
        }

        .admin-sidebar ul.components {
            padding: 0;
            border-bottom: 1px solid #47748b;
        }

        .admin-sidebar ul li a {
            padding: 12px 20px;
            display: block;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .admin-sidebar ul li a:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left: 3px solid var(--admin-accent);
        }

        .admin-sidebar ul li a.active {
            background: rgba(255, 255, 255, 0.1);
            border-left: 3px solid var(--admin-accent);
        }

        .admin-sidebar ul li a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .admin-sidebar .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px;
            background: var(--admin-secondary);
        }

        /* Main Content Area */
        .admin-content {
            margin-left: 250px;
            transition: all 0.3s;
            min-height: 100vh;
        }

        /* Navbar */
        .admin-navbar {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Cards and Widgets */
        .admin-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
        }

        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .dashboard-stat-card {
            border-left: 4px solid var(--admin-primary);
            border-radius: 4px;
        }

        .dashboard-stat-card.primary {
            border-left-color: var(--admin-primary);
        }

        .dashboard-stat-card.success {
            border-left-color: var(--admin-success);
        }

        .dashboard-stat-card.warning {
            border-left-color: var(--admin-warning);
        }

        .dashboard-stat-card.danger {
            border-left-color: var(--admin-danger);
        }

        .dashboard-stat-card.info {
            border-left-color: var(--admin-info);
        }

        /* Badge notifications */
        .notification-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 0.6rem;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .admin-sidebar {
                margin-left: -250px;
            }

            .admin-sidebar.active {
                margin-left: 0;
            }

            .admin-content {
                margin-left: 0;
            }

            .admin-content.active {
                margin-left: 250px;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    @yield('styles')
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <!-- Sidebar -->
        <nav id="sidebar" class="admin-sidebar">
            <div class="sidebar-header">
                <h4 class="mb-0">PSU Scholarship</h4>
                <p class="text-light mb-0"><small>Admin Panel</small></p>
            </div>

            <div class="px-3 py-2 d-flex align-items-center">
                <img src="/images/admin.png" class="rounded-circle me-2" alt="Admin"
                    style="width: 40px; height: 40px; object-fit: cover;">
                <div>
                    <h6 class="mb-0">{{ session('admin_fname') }} {{ session('admin_lname') }}</h6>

                </div>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('admin_dashboard') }}"
                        class="{{ request()->routeIs('admin_dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="/Scholars" class="">
                        <i class="fas fa-users"></i> Scholars
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.applications') }}"
                        class="{{ request()->routeIs('admin.applications') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i> Applications
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="d-flex justify-content-between">
                    <a href="" class="text-light" title="Profile">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <a href="" class="text-light" title="Notifications">
                        <i class="fas fa-bell"></i>
                    </a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-light" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="content" class="admin-content">

            <!-- Main Content -->
            <div class="container-fluid py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>

            <!-- Footer -->
            <!-- <footer class="bg-white py-3 px-4 border-top">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           <div class="container-fluid">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <p class="mb-0 text-muted">&copy; 2024 PSU Scholarship System. All rights reserved.</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="text-muted">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <span>Version 1.0.0</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->
        </div>
        </footer>
    </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.2/dist/chart.umd.min.js"></script>

    <script>
        $(document).ready(function () {
            // Toggle sidebar
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alertEl = document.querySelector('.alert-dismissible');
            if (alertEl) {
                setTimeout(() => {
                    // Bootstrap's fade out and remove alert after 3 seconds
                    const alert = bootstrap.Alert.getOrCreateInstance(alertEl);
                    alert.close();
                }, 3000);
            }
        });
    </script>

    @yield('scripts')
</body>

</html>