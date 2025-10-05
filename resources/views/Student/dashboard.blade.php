@extends('Student.StudentDashboardLayout')

@section('title', 'Scholarship Dashboard - PSU System')


@section('content')
<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white" style="width: 250px; min-height: 100vh; position: fixed; top: 0; left: 0;">
        <div class="p-3 border-bottom">
            <h4 class="mb-0">PSU Scholarship</h4>
        </div>

        <div class="p-3 border-bottom bg-primary">
            <div class="d-flex alin-items-center">
                <i class="fas fa-user-circle fa-2x me-2"></i>
                <div>
                    <h6 class="mb-0">{{ session('student_fname') }} {{ session('student_lname') }}</h6>

                </div>
            </div>
        </div>

        <div class="p-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="#">
                        <i class="fas fa-home me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-scroll me-2"></i> My Applications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('student.find-scholarship') }}">
                        <i class="fas fa-search me-2"></i> Find Scholarships
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-file-upload me-2"></i> Documents
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-money-bill-wave me-2"></i> Payment History
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-book me-2"></i> Resources
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-cog me-2"></i> Settings
                    </a>
                </li>
                <li class="nav-item mt-5">
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</form>

                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid py-4" style="margin-left: 250px;">
        <!-- Quick Stats for Scholarships -->
        <div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-center shadow-sm h-100">
            <div class="card-body">
                <i class="fas fa-scroll fa-3x mb-3 text-primary"></i>
                <h5 class="card-title">Applications</h5>
                <p class="card-text">2 Active</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center shadow-sm h-100">
            <div class="card-body">
                <i class="fas fa-check-circle fa-3x mb-3 text-success"></i>
                <h5 class="card-title">Approved</h5>
                <p class="card-text">1</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center shadow-sm h-100">
            <div class="card-body">
                <i class="fas fa-hourglass-half fa-3x mb-3 text-warning"></i>
                <h5 class="card-title">Pending</h5>
                <p class="card-text">1</p>
            </div>
        </div>
    </div>
</div>


        <!-- Main Dashboard Content -->
        <div class="row">
            <!-- Left Side - Current Applications -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">My Scholarship Applications</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th>Scholarship ID</th> -->
                                        <th>Scholarship Name</th>
                                        <!-- <th>Amount</th> -->
                                        <th>Applied Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>SCH-2024-001</td>
                                        <td>Academic Excellence Scholarship</td>
                                        <td>₱10,000</td>
                                        <td>June 15, 2024</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <!-- <td>SCH-2024-035</td> -->
                                        <td>TDP SCHOLARSHIP</td>
                                        <!-- <td>₱8,000</td> -->
                                        <td>May 14, 2025</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>SCH-2023-189</td>
                                        <td>Technology Innovation Scholarship</td>
                                        <td>₱15,000</td>
                                        <td>November 10, 2023</td>
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>SCH-2023-056</td>
                                        <td>Community Service Scholarship</td>
                                        <td>₱5,000</td>
                                        <td>August 05, 2023</td>
                                        <td><span class="badge bg-secondary">Expired</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="card-footer text-muted">
                        <small>Last updated: July 25, 2024</small>
                    </div> -->
                </div>

            </div>

        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    // Any dashboard-specific JavaScript can go here
    $(document).ready(function() {
        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Handle active class for sidebar
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endsection
