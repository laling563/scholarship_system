@extends('layouts.sponsor')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center fw-bold text-primary">
        <i class="fas fa-graduation-cap me-2"></i>Scholarship Applications
    </h1>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th><i class="fas fa-user me-1"></i> Student Name</th>
                            <th><i class="fas fa-book me-1"></i> Scholarship</th>
                            <th><i class="fas fa-info-circle me-1"></i> Status</th>
                            <th class="text-center"><i class="fas fa-cogs me-1"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applications as $application)
                        <tr>
                            <td class="fw-semibold">
                                {{ $application->student->fname }} {{ $application->student->lname }}
                            </td>
                            <td>{{ $application->scholarship->title }}</td>
                            <td>
                                @if($application->status == 'Pending')
                                    <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                @elseif($application->status == 'Approved')
                                    <span class="badge bg-success px-3 py-2">Approved</span>
                                @elseif($application->status == 'Rejected')
                                    <span class="badge bg-danger px-3 py-2">Rejected</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2">{{ $application->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('sponsor.applications.view', $application->applicationform_id) }}"
                                   class="btn btn-sm btn-outline-primary rounded-pill">
                                    <i class="fas fa-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                                No applications found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
