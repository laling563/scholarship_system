@extends('layouts.sponsor')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Welcome, {{ $sponsor->name }}!</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Total Applicants</h3>
            <p class="text-3xl font-bold">{{ $applications->count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Approved Applicants</h3>
            <p class="text-3xl font-bold">{{ $applications->where('status', 'approved')->count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Pending Applicants</h3>
            <p class="text-3xl font-bold">{{ $applications->where('status', 'pending')->count() }}</p>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-xl font-bold mb-4">Your Scholarships</h3>
        <ul class="list-group">
            @foreach($scholarships as $scholarship)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $scholarship->title }}
                    <span class="badge badge-primary badge-pill">{{ $scholarship->applicationForms->count() }} applicants</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
