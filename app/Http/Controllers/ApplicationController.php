<?php
namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\ApplicationForm; // Use ApplicationForm here instead of Application
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        // Eager load the relationships
        $applications = ApplicationForm::with(['student', 'scholarship'])
                            ->where('status', 'pending')
                            ->get();

        return view('Admin.ValidateApplication', compact('applications'));
    }


    public function view($id)
    {
        $application = ApplicationForm::with('student','documents')->findOrFail($id);
        return view('admin.applicationview')->with('application', $application);
    }

    public function accept($id)
    {

        $application = ApplicationForm::findOrFail($id);
    $application->status = 'approved'; // or whatever status you want

    $application->save();


    return redirect()->back()->with('success', 'Application accepted.');

    }

    public function reject($id)
    {
        $application = ApplicationForm::findOrFail($id);
    $application->status = 'rejected';
    $application->save();

    return redirect()->back()->with('success', 'Application rejected.');
    }

}
