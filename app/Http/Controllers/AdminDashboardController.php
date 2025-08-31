<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (!session('admin_id')) {
            return redirect()->route('Login.LoginPage')->with('error', 'Please log in first.');
        }
        else
            $TotalApplication = ApplicationForm::count();
            $TotalPending = ApplicationForm::where('status', 'pending')->count();
            $TotalAccept = ApplicationForm::where('status', 'approved')->count();
            $TotalStudent = Student::count();
            return view('Admin.dashboard')
            ->with('TotalApplication',$TotalApplication)
            ->with('TotalPending',$TotalPending)
            ->with('TotalAccept', $TotalAccept)
            ->with('TotalStudent',$TotalStudent);
    }
}
