@extends('Admin.AdminLayout')

@section('title', 'Admin Dashboard - PSU Scholarship System')

@section('styles')
<style>
    .stat-card {
        border-radius: 12px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .progress-thin {
        height: 6px;
        border-radius: 3px;
    }

    .recent-activity-item {
        border-left: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .recent-activity-item:hover {
        background-color: #f8f9fa;
        border-left-color: #0d6efd;
    }

    .task-item {
        border-left: 3px solid transparent;
    }

    .task-item.completed {
        opacity: 0.7;
    }

    .dashboard-header {
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ed 100%);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .scholarship-card {
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .scholarship-card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fw-bold mb-1">Dashboard Overview</h1>
                <p class="text-muted mb-0">Welcome back, {{ session('admin_fname') }} {{ session('admin_lname') }}!</p>
            </div>
            <div class="dropdown">
                <!-- <button class="btn btn-outline-primary dropdown-toggle" type="button" id="reportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-download me-2"></i> Generate Report
                </button> -->
                <ul class="dropdown-menu" aria-labelledby="reportDropdown">
                    <li><a class="dropdown-item" href="#">Monthly Report</a></li>
                    <li><a class="dropdown-item" href="#">Scholarship Summary</a></li>
                    <li><a class="dropdown-item" href="#">Financial Overview</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card bg-white p-4 h-100">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Applications</h6>
                        <h3 class="mb-0">{{$TotalApplication}}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up"></i> 12.5%
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card bg-white p-4 h-100">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Pending Review</h6>
                        <h3 class="mb-0">{{ $TotalPending }}</h3>
                        <small class="text-danger">
                            <i class="fas fa-arrow-up"></i> 8.3%
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card bg-white p-4 h-100">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Approved</h6>
                        <h3 class="mb-0">{{$TotalAccept}}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up"></i> 5.7%
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card bg-white p-4 h-100">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-info bg-opacity-10 text-info me-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Students</h6>
                        <h3 class="mb-0">{{$TotalStudent}}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up"></i> 3.2%
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="row g-4">

        <!-- Active Scholarships -->
        <div class="col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Active Scholarships</h5>
                        <a href="#" class="btn btn-sm btn-link">View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="mb-0">TDP SCHOLARSHIP</h6>
                            <small>17/30 slots</small>
                        </div>
                        <div class="progress progress-thin">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Row -->
    <div class="row g-4 mt-4">

    </div>
</div>
@endsection

@section('scripts')
<script>
    // Applications Statistics Chart
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('applicationsChart').getContext('2d');
        var applicationsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
                datasets: [
                    {
                        label: 'Total Applications',
                        data: [65, 78, 52, 91, 83, 157],
                        borderColor: '#3498db',
                        backgroundColor: 'rgba(52, 152, 219, 0.05)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Approved',
                        data: [42, 55, 40, 65, 59, 98],
                        borderColor: '#2ecc71',
                        backgroundColor: 'rgba(46, 204, 113, 0.05)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Rejected',
                        data: [10, 13, 7, 14, 12, 27],
                        borderColor: '#e74c3c',
                        backgroundColor: 'rgba(231, 76, 60, 0.05)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        },
                        ticks: {
                            precision: 0
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                elements: {
                    point: {
                        radius: 4,
                        hoverRadius: 6
                    }
                }
            }
        });
    });
</script>
@endsection
