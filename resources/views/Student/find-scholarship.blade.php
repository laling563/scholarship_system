@extends('Student.StudentDashboardLayout')

@section('title', 'Find Scholarships - PSU System')

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
                        <a class="nav-link text-white" href="{{ route('dashboard') }}">
                            <i class="fas fa-home me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-scroll me-2"></i> My Applications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="{{ route('student.find-scholarship') }}">
                            <i class="fas fa-search me-2"></i> Find Scholarships
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-cog me-2"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </form>

                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4" style="margin-left: 250px;">
            <div class="card shadow-sm">
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
                                        <small class="text-danger">Deadline:
                                            {{ \Carbon\Carbon::parse($scholarship->end_date)->format('M d, Y') }}</small>

                                        @if($isApplied)
                                            <button class="btn btn-sm btn-secondary" disabled>Already Applied</button>
                                        @elseif($isFull)
                                            <button class="btn btn-sm btn-danger" disabled>Slots Full</button>
                                        @else
                                            <a href="{{ route('scholarships.apply', $scholarship->scholarship_id) }}"
                                                class="btn btn-sm btn-outline-primary">Apply</a>
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
        </div>
    </div>
@endsection