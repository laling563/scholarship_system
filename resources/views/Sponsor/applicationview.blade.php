@extends('layouts.sponsor')

@section('content')
<div class="container">
    <h1>Application Details</h1>
    <p><strong>Student:</strong> {{ $application->student->fname }} {{ $application->student->lname }}</p>
    <p><strong>Scholarship:</strong> {{ $application->scholarship->title }}</p>
    <p><strong>Status:</strong> {{ $application->status }}</p>

    <h2>Documents</h2>
    <ul>
        @foreach($application->documents as $document)
        <li><a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">{{ $document->document_type }}</a></li>
        @endforeach
    </ul>

    @if($application->status == 'pending')
    <form action="{{ route('sponsor.applications.accept', $application->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-success">Accept</button>
    </form>
    <form action="{{ route('sponsor.applications.reject', $application->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-danger">Reject</button>
    </form>
    @endif
</div>
@endsection
