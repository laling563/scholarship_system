<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Scholarship;
use App\Models\ApplicationForm;

class SponsorDashboardController extends Controller
{
    public function index()
    {
        $sponsor = Auth::guard('sponsor')->user();

        // Eager load scholarships with a count of their applications
        $scholarships = $sponsor->scholarships()->withCount('applicationForms')->get();

        // Get all application IDs for the sponsor's scholarships
        $scholarshipIds = $sponsor->scholarships()->pluck('scholarship_id');

        // Get all applications for those scholarships
        $applications = ApplicationForm::whereIn('scholarship_id', $scholarshipIds)->get();

        return view('Sponsor.dashboard', compact('sponsor', 'scholarships', 'applications'));
    }
}
