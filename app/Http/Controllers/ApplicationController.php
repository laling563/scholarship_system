<?php
namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        if (Auth::guard('sponsor')->check()) {
            $sponsor = Auth::guard('sponsor')->user();
            $scholarshipIds = $sponsor->scholarships()->pluck('scholarship_id');

            $applications = ApplicationForm::with(['student', 'scholarship'])
                ->whereIn('scholarship_id', $scholarshipIds)
                ->where('status', 'pending')
                ->get();

            return view('Sponsor.applications', compact('applications'));
        }

        // For admin
        $applications = ApplicationForm::with(['student', 'scholarship'])
                            ->where('status', 'pending')
                            ->get();

        return view('Admin.ValidateApplication', compact('applications'));
    }

    public function view($id)
    {
        $application = ApplicationForm::with('student','documents')->findOrFail($id);

        if (Auth::guard('sponsor')->check()) {
            $this->authorizeSponsorAction($application);
            return view('Sponsor.applicationview', compact('application'));
        }

        return view('admin.applicationview', compact('application'));
    }

    public function accept($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $this->authorizeSponsorAction($application);
        $application->status = 'approved';
        $application->save();

        return redirect()->back()->with('success', 'Application accepted.');
    }

    public function reject($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $this->authorizeSponsorAction($application);
        $application->status = 'rejected';
        $application->save();

        return redirect()->back()->with('success', 'Application rejected.');
    }

    private function authorizeSponsorAction(ApplicationForm $application)
    {
        if (Auth::guard('sponsor')->check()) {
            $sponsor = Auth::guard('sponsor')->user();
            $scholarshipIds = $sponsor->scholarships()->pluck('scholarship_id')->toArray();

            if (!in_array($application->scholarship_id, $scholarshipIds)) {
                abort(403);
            }
        }
    }
}
