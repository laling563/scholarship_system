<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sponsor Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles for better UX */
    .nav-link.active {
      color: #0d6efd !important;
      border-bottom: 2px solid #0d6efd;
    }
    .navbar-brand {
      font-size: 1.3rem;
    }
    .btn-logout {
      transition: 0.3s;
    }
    .btn-logout:hover {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body class="bg-light">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
      <!-- Brand -->
      <a class="navbar-brand fw-bold text-primary" href="{{ route('sponsor.dashboard') }}">
        <i class="fas fa-hand-holding-heart me-2"></i>Sponsor Dashboard
      </a>

      <!-- Toggler for Mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('sponsor.dashboard') ? 'active fw-semibold' : '' }}"
               href="{{ route('sponsor.dashboard') }}">
              <i class="fas fa-home me-1"></i>Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('sponsor.applications') ? 'active fw-semibold' : '' }}"
               href="{{ route('sponsor.applications') }}">
              <i class="fas fa-file-alt me-1"></i>Applications
            </a>
          </li>
        </ul>

        <!-- Right Side (Logout) -->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-outline-danger btn-sm btn-logout">
                <i class="fas fa-sign-out-alt me-1"></i>Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main -->
  <main class="py-4">
    <div class="container">
      @yield('content')
    </div>
  </main>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
