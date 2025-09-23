@extends('layouts.sponsor')

@section('content')
<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- Left Column - Below 10k -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0"><i class="bi bi-file-earmark-text me-2"></i>Applications (Income ₱10,000 below)</h3>
                </div>
                <div class="card-body p-0 d-flex flex-column">
                    @if($applications->where('total_monthly_income', '<=', 10000)->count())
                    <div class="table-responsive" style="max-height: 65vh;">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light sticky-top">
                                <tr>
                                    <th>Student</th>
                                    <th>Scholarship</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4" style="width: 170px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications->where('total_monthly_income', '<=', 10000) as $application)
                                <tr>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">{{ $application->student->fname ?? 'No student' }} {{ $application->student->lname ?? '' }}</h6>
                                            <small class="text-muted">{{ $application->student->email ?? '' }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-soft-primary text-primary">
                                            {{ $application->scholarship->title ?? 'No scholarship' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{
                                            $application->status == 'approved' ? 'success' :
                                            ($application->status == 'rejected' ? 'danger' :
                                            'warning')
                                        }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#applicationModal{{ $application->id }}" data-bs-toggle="tooltip" data-bs-title="View Details">
                                                <i class="bi bi-eye"></i>
                                            </button>

                                            @if($application->status != 'approved')
                                            <form action="{{ route('sponsor.applications.accept', $application->applicationform_id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-success rounded-circle"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-title="Accept">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>
                                            </form>
                                            @endif

                                            @if($application->status != 'rejected')
                                            <form action="{{ route('sponsor.applications.reject', $application->applicationform_id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger rounded-circle"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-title="Reject">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5 flex-grow-1">
                        <i class="bi bi-file-earmark-text display-4 text-muted"></i>
                        <h4 class="mt-3 text-muted">No Applications Found</h4>
                        <p class="text-muted">No applications with income ≤ ₱10,000</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column - Above 10k -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0"><i class="bi bi-file-earmark-text me-2"></i>Applications (Income ₱10,000 above)</h3>
                </div>
                <div class="card-body p-0 d-flex flex-column">
                    @if($applications->where('total_monthly_income', '>', 10000)->count())
                    <div class="table-responsive" style="max-height: 65vh;">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light sticky-top">
                                <tr>
                                    <th>Student</th>
                                    <th>Scholarship</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4" style="width: 170px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications->where('total_monthly_income', '>', 10000) as $application)
                                <tr>
                                    <td>
                                        <div>
                                            <h6 class="mb-0">{{ $application->student->fname ?? 'No student' }} {{ $application->student->lname ?? '' }}</h6>
                                            <small class="text-muted">{{ $application->student->email ?? '' }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-soft-info text-info">
                                            {{ $application->scholarship->title ?? 'No scholarship' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{
                                            $application->status == 'approved' ? 'success' :
                                            ($application->status == 'rejected' ? 'danger' :
                                            'warning')
                                        }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#applicationModal{{ $application->id }}" data-bs-toggle="tooltip" data-bs-title="View Details">
                                                <i class="bi bi-eye"></i>
                                            </button>

                                            @if($application->status != 'approved')
                                            <form action="{{ route('sponsor.applications.accept', $application->applicationform_id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-success rounded-circle"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-title="Accept">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>
                                            </form>
                                            @endif

                                            @if($application->status != 'rejected')
                                            <form action="{{ route('sponsor.applications.reject', $application->applicationform_id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger rounded-circle"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-title="Reject">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5 flex-grow-1">
                        <i class="bi bi-file-earmark-text display-4 text-muted"></i>
                        <h4 class="mt-3 text-muted">No Applications Found</h4>
                        <p class="text-muted">No applications with income > ₱10,000</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($applications as $application)
<!-- Modal -->
<div class="modal fade" id="applicationModal{{ $application->id }}" tabindex="-1" aria-labelledby="applicationModalLabel{{ $application->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applicationModalLabel{{ $application->id }}">Application Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Application #{{ $application->id }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $application->scholarship->title }}</h5>
                        <p class="card-text"><strong>Student:</strong> {{ $application->student->fname }} {{ $application->student->lname }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ $application->status }}</p>
                        <p class="card-text"><strong>Applied At:</strong> {{ $application->created_at }}</p>

                        <hr>
                        <h5>Personal Information</h5>
                        <p class="card-text"><strong>Date of Birth:</strong> {{ $application->date_of_birth }}</p>
                        <p class="card-text"><strong>Civil Status:</strong> {{ $application->civil_status }}</p>
                        <p class="card-text"><strong>Place of Birth:</strong> {{ $application->place_of_birth }}</p>
                        <p class="card-text"><strong>Religion:</strong> {{ $application->religion }}</p>
                        <p class="card-text"><strong>Height:</strong> {{ $application->height }}</p>
                        <p class="card-text"><strong>Weight:</strong> {{ $application->weight }}</p>
                        <p class="card-text"><strong>Home Address:</strong> {{ $application->home_address }}</p>
                        <p class="card-text"><strong>Contact Address:</strong> {{ $application->contact_address }}</p>
                        <p class="card-text"><strong>Boarding Address:</strong> {{ $application->boarding_address }}</p>
                        <p class="card-text"><strong>Landlord/Landlady:</strong> {{ $application->landlord_landlady }}</p>
                        <p class="card-text"><strong>High School Graduated:</strong> {{ $application->high_school_graduated }}</p>
                        <p class="card-text"><strong>High School Year Graduated:</strong> {{ $application->high_school_year_graduated }}</p>
                        <p class="card-text"><strong>Special Skills:</strong> {{ $application->special_skills }}</p>
                        <p class="card-text"><strong>Curriculum Year:</strong> {{ $application->curriculum_year }}</p>

                        <hr>
                        <h5>Family Background</h5>
                        <p class="card-text"><strong>Father's Name:</strong> {{ $application->father_first_name }} {{ $application->father_middle_name }} {{ $application->father_last_name }}</p>
                        <p class="card-text"><strong>Father's Occupation:</strong> {{ $application->father_occupation }}</p>
                        <p class="card-text"><strong>Father's Monthly Income:</strong> {{ $application->father_monthly_income }}</p>
                        <p class="card-text"><strong>Father's Educational Attainment:</strong> {{ $application->father_educational_attainment }}</p>
                        <p class="card-text"><strong>Father's School Graduated:</strong> {{ $application->father_school_graduated }}</p>
                        <p class="card-text"><strong>Father's Year Graduated:</strong> {{ $application->father_year_graduated }}</p>
                        <br>
                        <p class="card-text"><strong>Mother's Name:</strong> {{ $application->mother_first_name }} {{ $application->mother_middle_name }} {{ $application->mother_last_name }}</p>
                        <p class="card-text"><strong>Mother's Occupation:</strong> {{ $application->mother_occupation }}</p>
                        <p class="card-text"><strong>Mother's Monthly Income:</strong> {{ $application->mother_monthly_income }}</p>
                        <p class="card-text"><strong>Mother's Educational Attainment:</strong> {{ $application->mother_educational_attainment }}</p>
                        <p class="card-text"><strong>Mother's School Graduated:</strong> {{ $application->mother_school_graduated }}</p>
                        <p class="card-text"><strong>Mother's Year Graduated:</strong> {{ $application->mother_year_graduated }}</p>
                        <br>
                        <p class="card-text"><strong>Number of Brothers:</strong> {{ $application->number_of_brothers }}</p>
                        <p class="card-text"><strong>Number of Sisters:</strong> {{ $application->number_of_sisters }}</p>
                        <p class="card-text"><strong>Total Monthly Income:</strong> {{ $application->total_monthly_income }}</p>

                        <hr>
                        <h5>Notes</h5>
                        <p class="card-text">{{ $application->notes }}</p>


                        <h5>Application Documents</h5>
                        @if (isset($application->documents) && $application->documents->count() > 0)
                        <ul>
                            @foreach ($application->documents as $document)
                            <li><a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">{{ $document->document_name }}</a></li>
                            @endforeach
                        </ul>
                        @else
                        <p>No documents submitted.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }
    .badge {
        padding: 0.35em 0.5em;
        font-weight: 500;
        font-size: 0.75em;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
    .card {
        border-radius: 0.75rem;
        height: 100%;
    }
    .card-header {
        border-radius: 0.75rem 0.75rem 0 0 !important;
    }
    .table-responsive {
        overflow-y: auto;
        flex: 1;
    }
    .sticky-top {
        position: sticky;
        top: 0;
        background-color: #f8f9fa;
        z-index: 1;
    }
</style>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection