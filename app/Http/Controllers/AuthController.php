<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\AuditLog;

class AuthController extends Controller
{

    public function auth_login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Successful login with 'email'
            AuditLog::create([
                'user_id' => Auth::id(),  // Get the ID of the logged-in user
                'action' => 'Login',  // Action type
                'type' => 'User Account',  // Type of entity being logged (user here)
                'activity_description' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' has successfully logged in.',
            ]);

            return redirect()->route('admin.dashboard')->with(['success' => 'Login successfully!']);
        } else {
            // Check using 'staff_email' if login with 'email' fails
            if (Auth::attempt(['staff_email' => $request->email, 'password' => $request->password])) {
                // Successful login with 'staff_email'
                AuditLog::create([
                    'user_id' => Auth::id(),  // Get the ID of the logged-in user
                    'action' => 'Login',  // Action type
                    'type' => 'Staff Account',  // Type of entity being logged (staff here)
                    'activity_description' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' has successfully logged in.',
                ]);

                return redirect()->route('admin.dashboard')->with(['success' => 'Login successfully!']);
            } else {
                // If neither 'email' nor 'staff_email' matched
                return redirect()->back()->with('error', 'Please enter correct email or password!');
            }
        }
    }

    public function auth_logout(Request $request)
    {
        // Log the logout action
        if (Auth::check()) {
            AuditLog::create([
                'user_id' => Auth::id(),  // Get the ID of the logged-in user
                'action' => 'Logout',  // Action type is logout
                'type' => 'User Account',  // Entity type is user
                'activity_description' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' has logged out.',
            ]);
        }

        // Perform the logout process
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect with success message
        return redirect()->route('login')->with(['clear_cache' => true, 'success' => 'You have successfully logged out.']);
    }
}
