<?php
namespace App\Http\Controllers;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
    public function availableScholarships()
    {
        $scholarships = Scholarship::where('is_open', true)->get();
        return view('Student.dashboard', compact('scholarships'));
    }

    public function index()
    {
        $sponsor = Auth::guard('sponsor')->user();
        $scholarships = $sponsor->scholarships()->latest()->paginate(10);
        return view('Sponsor.scholarships', compact('scholarships'));
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

        $sponsor = Auth::guard('sponsor')->user();
        $sponsor->scholarships()->create($request->all());

        return redirect()->route('sponsor.scholarships.index')->with('success', 'Scholarship created successfully.');
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('Sponsor.EditScholarship', compact('scholarship'));
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

        return redirect()->route('sponsor.scholarships.index')->with('success', 'Scholarship updated successfully.');
    }

    public function destroy($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $scholarship->delete();

        return redirect()->route('sponsor.scholarships.index')->with('success', 'Scholarship deleted successfully.');
    }
}
