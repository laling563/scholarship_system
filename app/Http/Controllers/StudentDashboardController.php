<?php

// StudentDashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::where('is_open', true)->get();
        return view('Student.dashboard', data: compact('scholarships'));
    }
    public function availableScholarships()
    {
        $studentId = session('student_id');
    
        if (!$studentId) {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    
        // 👇 Get all scholarships
        $scholarships = \App\Models\Scholarship::where('is_open', true)->get();
    
        // 👇 Get list of already applied scholarship IDs
        $appliedScholarshipIds = \App\Models\ApplicationForm::where('student_id', $studentId)
            ->pluck('scholarship_id');
    
        // 👇 Pass both to the view
        return view('Student.dashboard', [
            'scholarships' => $scholarships,
            'appliedScholarshipIds' => $appliedScholarshipIds
        ]);
    }

    public function ListScholarship()
{
    $studentId = session('student_id');
        
        if (!$studentId) {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
        
        // Get IDs of scholarships the student already applied to
        $appliedScholarshipIds = \App\Models\ApplicationForm::where('student_id', $studentId)
            ->pluck('scholarship_id');
        
        // Get scholarships that are open AND not full
        $scholarships = \App\Models\Scholarship::where('is_open', true)
            ->get();
        
        return view('Student.ListScholarship', compact('scholarships', 'appliedScholarshipIds'));

}
}

