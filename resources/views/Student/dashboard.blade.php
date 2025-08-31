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
                    <a class="nav-link text-white" href="">
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
            <div class="col-md-8 mb-4">
                {{-- <div class="card shadow-sm">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">My Scholarship Applications</h5>
                        <a href="" class="btn btn-primary btn-sm">Apply for New Scholarship</a>
                    </div>
                    <div class="card-body">
                        @if($formattedApplications->count())
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Scholarship ID</th>
                                        <th>Scholarship Name</th>
                                        <th>Amount</th>
                                        <th>Applied Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($formattedApplications as $application)
                                    <tr>
                                        <td>{{ $application['scholarship_id'] }}</td>
                                        <td>{{ $application['scholarship_name'] }}</td>

                                        <td>{{ $application['applied_date'] }}</td>
                                        <td><span class="badge {{ $application['status_class'] }}">{{ ucfirst($application['status']) }}</span></td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="text-center py-4">
                            <p class="mb-0">You haven't applied for any scholarships yet.</p>
                            <a href="" class="btn btn-primary mt-3">Browse Available Scholarships</a>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer text-muted">
                        <small>Last updated: {{ \Carbon\Carbon::now()->format('F d, Y') }}</small>
                    </div>
                </div> --}}
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

                <!-- Application Status Timeline -->
                <!-- <div class="card shadow-sm mt-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Current Application Status: Leadership Development Grant</h5>
                    </div>
                    <div class="card-body">
                        <div class="position-relative py-2">
                            <div class="position-relative ps-4">
                                <div class="border-start border-2 border-primary position-absolute h-100" style="left: 7px;"></div> -->

                                <!-- Timeline Item 1 -->
                                <!-- <div class="d-flex mb-4">
                                    <div class="position-absolute" style="left: 0;">
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 15px; height: 15px;"></div>
                                    </div>
                                    <div class="ms-4">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Application Submitted</h6>
                                            <small class="text-muted">July 22, 2024</small>
                                        </div>
                                        <p class="text-muted mb-0">Your application has been received and is under initial review.</p>
                                    </div>
                                </div> -->

                                <!-- Timeline Item 2 -->
                                <!-- <div class="d-flex mb-4">
                                    <div class="position-absolute" style="left: 0;">
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 15px; height: 15px;"></div>
                                    </div>
                                    <div class="ms-4">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Document Verification</h6>
                                            <small class="text-muted">July 25, 2024</small>
                                        </div>
                                        <p class="text-muted mb-0">Your documents have been verified and passed to the scholarship committee.</p>
                                    </div>
                                </div> -->

                                <!-- Timeline Item 3 -->
                                <!-- <div class="d-flex mb-4">
                                    <div class="position-absolute" style="left: 0;">
                                        <div class="rounded-circle bg-secondary bg-opacity-50 text-white d-flex align-items-center justify-content-center" style="width: 15px; height: 15px;"></div>
                                    </div>
                                    <div class="ms-4">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1 text-muted">Committee Review</h6>
                                            <small class="text-muted">Pending</small>
                                        </div>
                                        <p class="text-muted mb-0">The scholarship committee will evaluate your application.</p>
                                    </div>
                                </div> -->

                                <!-- Timeline Item 4 -->
                                <!-- <div class="d-flex">
                                    <div class="position-absolute" style="left: 0;">
                                        <div class="rounded-circle bg-secondary bg-opacity-50 text-white d-flex align-items-center justify-content-center" style="width: 15px; height: 15px;"></div>
                                    </div>
                                    <div class="ms-4">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1 text-muted">Final Decision</h6>
                                            <small class="text-muted">Pending</small>
                                        </div>
                                        <p class="text-muted mb-0">Expected decision date: August 10, 2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- Right Side - Available Scholarships & Resources -->
            <div class="col-md-4">
               <!-- Available Scholarships -->
               <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Available Scholarships</h5>
                </div>
                <div class="card-body p-0">
                    @if($scholarships->count())
                    <ul class="list-group list-group-flush">
                        @foreach($scholarships as $scholarship)
                        @php
                            $applicantCount = \App\Models\ApplicationForm::where('scholarship_id', $scholarship->scholarship_id)->count();
                            $isApplied = $appliedScholarshipIds->contains($scholarship->scholarship_id);
                            $isFull = $applicantCount >= $scholarship->student_limit;
                        @endphp
                        <li class="list-group-item">
                            <h6 class="mb-1">{{ $scholarship->title }}</h6>
                            <p class="mb-1 small">{{ $scholarship->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-danger">Deadline: {{ \Carbon\Carbon::parse($scholarship->end_date)->format('M d, Y') }}</small>

                                @if($isApplied)
                                    <button class="btn btn-sm btn-secondary" disabled>Already Applied</button>
                                @elseif($isFull)
                                    <button class="btn btn-sm btn-danger" disabled>Slots Full</button>
                                @else
                                    <a href="{{ route('scholarships.apply', $scholarship->scholarship_id) }}" class="btn btn-sm btn-outline-primary">Apply</a>
                                @endif

                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <div class="p-3">
                        <p class="mb-0">No scholarships available at the moment.</p>
                    </div>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="text-decoration-none">View All Scholarships</a>
                </div>
            </div>



                <!-- Required Documents -->
                <!-- <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Required Documents</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span>Academic Transcript</span>
                                <span class="badge bg-success">Submitted</span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span>Certificate of Enrollment</span>
                                <span class="badge bg-success">Submitted</span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span>Parents' Income Certificate</span>
                                <span class="badge bg-danger">Missing</span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span>Recommendation Letter</span>
                                <span class="badge bg-warning">Pending</span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <a href="#" class="btn btn-primary">Upload Documents</a>
                        </div>
                    </div>
                </div> -->

                <!-- Scholarship Resources -->
                <!--
                 -->
            </div>
        </div>

        <!-- Payment History -->
        <!-- <div  iv class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Scholarship Payment History</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Scholarship</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Receipt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>TXN-2024-1089</td>
                                        <td>Academic Excellence Scholarship</td>
                                        <td>₱5,000</td>
                                        <td>July 15, 2024</td>
                                        <td><span class="badge bg-success">Disbursed</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TXN-2024-0735</td>
                                        <td>Academic Excellence Scholarship</td>
                                        <td>₱5,000</td>
                                        <td>June 15, 2024</td>
                                        <td><span class="badge bg-success">Disbursed</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TXN-2024-0493</td>
                                        <td>Academic Excellence Scholarship</td>
                                        <td>₱5,000</td>
                                        <td>May 15, 2024</td>
                                        <td><span class="badge bg-success">Disbursed</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Download</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
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
