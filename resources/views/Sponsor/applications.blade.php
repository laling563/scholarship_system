@extends('layouts.sponsor')

@section('content')
<div class="container">
    <h1>Scholarship Applications</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Scholarship</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
            <tr>
                <td>{{ $application->student->fname }} {{ $application->student->lname }}</td>
                <td>{{ $application->scholarship->title }}</td>
                <td>{{ $application->status }}</td>
                <td>
                    <a href="{{ route('sponsor.applications.view', $application->id) }}" class="btn btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
