<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function createUserAccount(Request $request)
    {

        $request->validate([
            'userFirstname' => 'required|string|min:2',
            'userMiddlename' => 'nullable|string|min:2',
            'userLastname' => 'required|string|min:2',
            'userPhone' => 'nullable',
            'staff_school_email' => 'required|email|unique:users',
            'staff_email' => 'required|email|unique:users',
            'userPassword' => 'required|min:3|confirmed',
            'userProfilePicture' => 'nullable|max:2048|mimes:jpeg,jpg,png,svg,webp'
        ]);

        $defaultImage = 'assets/images/userProfile/default-user-profile-pic.jpg';
        $imageUrl = null;

        // Handle image uploads
        if ($request->hasFile('userProfilePicture')) {
            $imageFile = $request->file('userProfilePicture');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/images/userProfile/'), $imageName);
            $imageUrl = 'assets/images/userProfile/' . $imageName;
        }


        User::create([
            'firstname' => $request->userFirstname,
            'middlename' => $request->userMiddlename,
            'lastname' => $request->userLastname,
            'phone' => $request->userPhone,
            'school_email' => $request->staff_school_email,
            'email' => $request->staff_email,
            'staff_school_email' => $request->staff_school_email,
            'staff_email' => $request->staff_email,
            'password' => $request->userPassword,
            'image_url' => $imageUrl !== null ? $imageUrl : $defaultImage
        ]);


        $user = Auth::user();


        // Created Audit Log For creating user
        AuditLog::create([
            'user_id' => $user->id,  // Assuming the user is logged in
            'action' => 'Create',  // The activity type is 'create' since a new member is being added
            'type' => 'Staff Account',
            'book_id' => null,      // Not applicable to this action
            'book_copy_id' => null,      // Not applicable
            'member_id' => null,  // Reference the newly created member ID
            'activity_description' => $user->name . ' has created a new staff account: ' . $request->firstname . ' ' . $request->lastname . '.',
        ]);


        return back()->with(['success' => 'Staff Account created successfully!']);
    }


    public function showStaff(User $staff)
    {



        return view('admin.staffEdit')->with(['staff' => $staff]);
    }


    public function inactiveUser(User $staff)
    {
        // Update the user's status to inactive
        $staff->update([
            'status' => 'inactive',
        ]);
    
        // Create the audit log for this action
        AuditLog::create([
            'user_id' => Auth::user()->id,  // Assuming the user is logged in and has access to this action
            'action' => 'Deactivate',  // The activity type is 'deactivate' since the user's status is being updated
            'type' => 'Staff Account',
            'book_id' => null,  // Not applicable to this action
            'book_copy_id' => null,  // Not applicable
            'member_id' => $staff->id,  // Reference the deactivated staff's ID
            'activity_description' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' has deactivated the staff account of ' . $staff->firstname . ' ' . $staff->lastname . '.'
        ]);
    
        return back()->with(['success' => 'Staff account successfully deactivated!']);
    }
    

    public function activeUser(User $staff)
    {
        // Update the user's status to active
        $staff->update([
            'status' => 'active',
        ]);

        // Create the audit log for this action
        AuditLog::create([
            'user_id' => Auth::user()->id,  // Assuming the user is logged in and has access to this action
            'action' => 'Activate',  // The activity type is 'activate' since the user's status is being updated
            'type' => 'Staff Account',
            'book_id' => null,  // Not applicable to this action
            'book_copy_id' => null,  // Not applicable
            'member_id' => $staff->id,  // Reference the activated staff's ID
            'activity_description' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' has activated the staff account of ' . $staff->firstname . ' ' . $staff->lastname . '.',
        ]);

        return back()->with(['success' => 'Staff account successfully activated!']);
    }


    public function deleteUser(User $staff)
    {

        $staff = User::findOrFail($staff->id);
        // Delete the staff account
        $staff->delete();

        // Get the currently aut;henticated user who is performing the delete action
        $user = Auth::user();

        // Create an audit log entry for the deletion
        AuditLog::create([
            'user_id' => $user->id,  // The user performing the action (admin or staff)
            'action' => 'Delete',
            'type' => 'Staff Account',
            'activity_description' => $user->firstname . ' ' . $user->lastname . ' deleted the staff account of ' . $staff->firstname . ' ' . $staff->lastname . '.',
            'book_id' => null,
            'book_copy_id' => null,
            'member_id' => null,
        ]);

        // Return with success message
        return redirect()->back()->with(['success' => 'Staff account deleted successfully.']);
    }

    public function updateStaffInfo(Request $request, User $staff)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'staff_school_email' => 'required|email',
            'staff_email' => 'required|email',
            'contact_number' => 'required',
        ]);

        // Update the user data
        User::where('id', $staff->id)->update([
            'firstname' => $request->first_name,
            'middlename' => $request->middle_name,
            'lastname' => $request->last_name,
            'phone' => $request->contact_number,
            'staff_school_email' => $request->school_email,
            'staff_email' => $request->personal_email,
            'school_email' => $request->school_email,
            'email' => $request->personal_email,
        ]);

        // Make a audit log when user is update its profile
        $user = Auth::user();

        AuditLog::create([
            'user_id' => $user->id,
            'action' => 'Update',
            'type' => 'Staff Profile',
            'activity_description' => $user->firstname . ' ' . $user->lastname . ' updated the profile of staff named ' . $staff->firstname . ' ' . $staff->lastname . '. Changes include updating contact details and email addresses.',
            'book_id' => null,
            'book_copy_id' => null,
            'member_id' => null,
        ]);

        return back()->with(['success' => 'Staff information updated successfully!']);
    }
}
