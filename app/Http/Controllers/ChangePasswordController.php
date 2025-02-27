<?php

// app/Http/Controllers/Auth/PasswordController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AuditLog;
use App\Models\Notification;


class ChangePasswordController extends Controller
{
    /**
     * Show the form for changing the password.
     *
     * @return \Illuminate\View\View
     */

    /**
     * Handle the password change request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function changePassword(Request $request)
    {
        $request->validate([

            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed'

        ],[

            'current_password.required' => 'The current password is required.',
            'new_password.required' => 'Please enter a new password.',
            'new_password.min' => 'The new password must be at least 6 characters.',
            'new_password.confirmed' => 'The new password confirmation does not match.',

        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Get the authenticated user id
        $user_id = $user->id;

        // Check if the current password is correct
        if(!Hash::check($request->current_password, Auth::user()->password)){

            return back()->with(['error' => 'Current password is incorrect!']);
        }
        
        // Update the user password
        User::where('id', $user_id)->update([
            'password' => Hash::make($request->new_password)
        ]);


        // Make a audit log for change password
        AuditLog::create([
            'user_id' => $user_id,  // The user who performed the action
            'action' => 'Update',  // The activity type is 'update'
            'type' => 'User Password',
            'book_id' => null,  // Not applicable, since it's related to a user action
            'book_copy_id' => null,  // Not applicable
            'member_id' => null,  // Not applicable
            'activity_description' => $user->firstname . ' ' . $user->lastname . ' has updated their password.',
        ]);        

        
        return back()->with('success', 'Password updated successful!');
    }
}

