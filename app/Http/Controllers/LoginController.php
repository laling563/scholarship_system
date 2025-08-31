<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Scholarship;
use App\Models\Admin;  // Add the Admin model

class LoginController extends Controller
{
    public function LoginPage()
    {
        return view('Login.LoginPage');
    }

    public function RegistrationPage()
    {
        return view('Login.RegistrationPage');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $login_input = $request->input('login');

        // Check if input is an email or student_id (or admin email/faculty_id)
        $student = null;
        $admin = null;

        // Check if it's a student or admin login based on the input format
        if (filter_var($login_input, FILTER_VALIDATE_EMAIL)) {
            // If it's an email, look for a student or admin
            $student = Student::where('email', $login_input)->first();
            $admin = Admin::where('email', $login_input)->first();
        } else {
            // If it's not an email, assume it's a student_id or faculty_id for admin login
            $student = Student::where('student_id', $login_input)->first();
            $admin = Admin::where('faculty_id', $login_input)->first();
        }

        // Check if student login is valid
        if ($student && Hash::check($request->password, $student->password)) {
            // Manually login the student
            $scholarships = Scholarship::where('is_open', true)->get();
            session([
                'student_id' => $student->id,
                'student_fname' => $student->fname,
                'student_lname' => $student->lname,
                'student_email' => $student->email,
                'student_course' => $student->course,
                'student_yearlevel' => $student->year_level,
                // Add more attributes as needed
            ]);
            return redirect()->route('dashboard')
            ->with('success', 'Student login successful!')
            ->with('scholarships', $scholarships)
            ;
        }

        // Check if admin login is valid
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Manually login the admin
            session([
                'admin_id' => $admin->id,
                'admin_fname' => $admin->fname,
                'admin_lname' => $admin->lname,
                'admin_email' => $admin->email,
                'admin_role' => $admin->role,  // Add more attributes as needed
            ]);
            return redirect()->route('admin_dashboard')->with('success', 'Admin login successful!');
        }

        // If no match is found
        return back()->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['student_id', 'admin_id']);  // Clear both student and admin session data
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('LoginPage')->with('success', 'Logged out successfully.');
    }
}
