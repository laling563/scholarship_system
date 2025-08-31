@extends('layouts.sponsor')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                <i class="fas fa-file-alt me-2"></i>Application Details
            </h3>
            <a href="{{ route('sponsor.applications') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>

        <div class="card-body p-4">
            <!-- Student Info -->
            <div class="mb-3">
                <p class="mb-2"><strong><i class="fas fa-user me-1 text-secondary"></i> Student:</strong>
                    {{ $application->student->fname }} {{ $application->student->lname }}
                </p>
                <p class="mb-2"><strong><i class="fas fa-book me-1 text-secondary"></i> Scholarship:</strong>
                    {{ $application->scholarship->title }}
                </p>
                <p class="mb-0">
                    <strong><i class="fas fa-info-circle me-1 text-secondary"></i> Status:</strong>
                    @if($application->status == 'Pending')
                        <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                    @elseif($application->status == 'Approved')
                        <span class="badge bg-success px-3 py-2">Approved</span>
                    @elseif($application->status == 'Rejected')
                        <span class="badge bg-danger px-3 py-2">Rejected</span>
                    @else
                        <span class="badge bg-secondary px-3 py-2">{{ ucfirst($application->status) }}</span>
                    @endif
                </p>
            </div>

            <!-- Documents -->
            <h5 class="mt-4"><i class="fas fa-folder-open me-2 text-primary"></i>Documents</h5>
            @if($application->documents->count() > 0)
                <ul class="list-group mb-3 shadow-sm">
                    @foreach($application->documents as $document)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-file me-1 text-secondary"></i> {{ $document->document_type }}</span>
                        <a href="{{ asset('storage/' . $document->file_path) }}"
                           target="_blank"
                           class="btn btn-sm btn-outline-primary rounded-pill">
                            <i class="fas fa-eye me-1"></i> View
                        </a>
                    </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted"><i class="fas fa-exclamation-circle me-1"></i> No documents uploaded.</p>
            @endif

            <!-- Actions -->
            @if($application->status == 'Pending')
            <div class="d-flex flex-column flex-sm-row gap-2 mt-4">
                <form action="{{ route('sponsor.applications.accept', $application->id) }}" method="POST" class="w-100">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-check-circle me-1"></i> Accept
                    </button>
                </form>
                <form action="{{ route('sponsor.applications.reject', $application->id) }}" method="POST" class="w-100">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="fas fa-times-circle me-1"></i> Reject
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
