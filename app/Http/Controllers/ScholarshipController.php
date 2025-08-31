<?php
namespace App\Http\Controllers;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    // public function myScholarshipApplications()
    // {
    //     $studentId = session('student_id');
        
    //     if (!$studentId) {
    //         return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
    //     }
        
    //     // Get all applications for this student with scholarship details
    //     $applications = \App\Models\ApplicationForm::where('student_id', $studentId)
    //         ->with('scholarship')  // Assuming you have a relationship set up
    //         ->orderBy('created_at', 'desc')
    //         ->get();
        
    //     // Format the applications data for display
    //     $formattedApplications = $applications->map(function($application) {
    //         // Determine status (you might need to adjust this based on your data structure)
    //         $statusClass = match($application->status) {
    //             'approved' => 'bg-success',
    //             'pending' => 'bg-warning',
    //             'rejected' => 'bg-danger',
    //             'expired' => 'bg-secondary',
    //             default => 'bg-secondary'
    //         };
            
    //         // Format date
    //         $appliedDate = \Carbon\Carbon::parse($application->created_at)->format('F d, Y');
            
    //         // Calculate if expired based on scholarship end date
    //         $isExpired = $application->status === 'pending' && 
    //                     \Carbon\Carbon::parse($application->scholarship->end_date)->isPast();
            
    //         if ($isExpired) {
    //             $application->status = 'expired';
    //             $statusClass = 'bg-secondary';
    //         }
            
    //         return [
    //             'id' => $application->id,
    //             'scholarship_id' => $application->scholarship->scholarship_code ?? ('SCH-' . date('Y') . '-' . str_pad($application->scholarship_id, 3, '0', STR_PAD_LEFT)),
    //             'scholarship_name' => $application->scholarship->title,
                
    //             'applied_date' => $appliedDate,
    //             'status' => $application->status,
                
    //             'scholarship_id_numeric' => $application->scholarship_id
    //         ];
    //     });
        
    //     return view('Student.dashboard', compact('formattedApplications'));
    // }
 public function availableScholarships()
{
    $scholarships = Scholarship::where('is_open', true)->get();
    return view('Student.dashboard', compact('scholarships'));
}

    public function index()
    {
        $scholarships = Scholarship::latest()->paginate(10);
        return view('Scholarship.scholarships', compact('scholarships'));
    }

    public function create()
    {
        return view('Scholarship.CreateScholarship');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'is_open' => 'sometimes|boolean',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'student_limit' => 'nullable|integer',
        ]);

        Scholarship::create($request->all());
        return redirect()->route('Scholarship.index')->with('success', 'Scholarship created successfully.');
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('Scholarship.EditScholarship', compact('scholarship'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'is_open' => 'sometimes|boolean',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'student_limit' => 'nullable|integer',
        ]);

        $scholarship = Scholarship::findOrFail($id);
        $scholarship->update($request->all());

        return redirect()->route('Scholarship.index')->with('success', 'Scholarship updated successfully.');
    }

    public function destroy($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $scholarship->delete();

        return redirect()->route('Scholarship.index')->with('success', 'Scholarship deleted successfully.');
    }
}
