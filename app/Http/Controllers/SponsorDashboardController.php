<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorDashboardController extends Controller
{
    public function index()
    {
        $sponsor = Auth::guard('sponsor')->user();
        $scholarships = $sponsor->scholarships;
        $applications = $sponsor->scholarships()->with('applicationForms')->get()->flatMap(function ($scholarship) {
            return $scholarship->applicationForms;
        });

        return view('Sponsor.dashboard', compact('sponsor', 'scholarships', 'applications'));
    }
}
