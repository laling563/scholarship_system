@extends('Admin.AdminLayout')

@section('content')
<div class="container">
    <h1>Applications</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Fullname</th>
                <th>Scholarship</th>
                <th>Status</th>
                <th>Applied At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
            <tr>
                <td>{{ $application->student->student_id }}</td>
                <td>{{ $application->student->fname }} {{ $application->student->lname }}</td>
                <td>{{ $application->scholarship->title }}</td>
                <td>{{ $application->status }}</td>
                <td>{{ $application->created_at }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applicationModal{{ $application->id }}">
                        View
                    </button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="applicationModal{{ $application->id }}" tabindex="-1" aria-labelledby="applicationModalLabel{{ $application->id }}" aria-hidden="true">
                <div class="modal-dialog">
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
        </tbody>
    </table>
</div>
@endsection
