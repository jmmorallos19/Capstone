<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG; // Import Barcode generator class
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Support\Facades\Storage;
use App\Models\AuditLog;
use App\Models\Notification;


class MemberController extends Controller
{

    public function addMember(Request $request)
    {
        // Validate the form data
        $request->validate([
            'library_card_no' => 'unique:members',
            'name' => 'required|string|max:255',
            'memberGroup' => 'required|string',
            'course' => 'required|string',
            'student_no' => 'required|string|unique:members',
            'email' => 'required|email|unique:members',
            'phone' => 'nullable|min:11',
            'address' => 'required|string|max:255',
            'imageFile' => 'nullable|max:2048|mimes:jpeg,jpg,png,svg',
            'guardianName' => 'required|string|max:255',
            'guardianAddress' => 'required|string|max:255',
            'guardianContact' => 'nullable|min:11',
            'barcode' => 'nullable|string|size:13|regex:/^\d+$/'
        ],
        [
            'phone.integer' => 'The phone number must be a valid number',
            'guardianContact.integer' => 'The guardian contact number must be a valid number',
        ]);

        // Logic to generate the new library card number
        $lastMember = Member::orderBy('library_card_no', 'desc')->first();

        if ($lastMember && $lastMember->library_card_no !== null) {
            $lastNumberpart = substr($lastMember->library_card_no, 5);
            $nextMemberLibraryNo = intval($lastNumberpart) + 1;
        } else {
            $nextMemberLibraryNo = 1;  // Starting with 1 if no records exist
        }

        $nextMemberLibraryNo = str_pad((intval($nextMemberLibraryNo)), 4, '0', STR_PAD_LEFT);
        $staticYear = "2025-";
        $nextMemberLibraryNo = $staticYear . $nextMemberLibraryNo;

        // Generate the barcode based on the new library card number
        $generator = new BarcodeGeneratorPNG();
        $barcodeImage = $generator->getBarcode($nextMemberLibraryNo, BarcodeGeneratorPNG::TYPE_CODE_128);

        // Define the directory and path for the barcode image
        $directory = public_path('assets/images/memberBarcode');
        $barcodePath = $directory . '/' . $nextMemberLibraryNo . '.jpeg';

        // Create the directory if it doesn't exist
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        // Save the barcode image as a PNG file
        file_put_contents($barcodePath, $barcodeImage);

        // Default image if no image is uploaded
        $defaultImage = 'assets/images/memberImage/default-user-profile-pic.jpg';
        $imageUrl = null;

        // Handle image uploads
        if ($request->hasFile('imageFile')) {
            $imageFile = $request->file('imageFile');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/images/memberImage/'), $imageName);
            $imageUrl = 'assets/images/memberImage/' . $imageName;
        }

        // Create the member record
        $member = Member::create([
            'library_card_no' => $nextMemberLibraryNo,
            'name' => $request->name,
            'member_group' => $request->memberGroup,
            'year_and_course' => $request->course,
            'student_no' => $request->student_no,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image_url' => $imageUrl !== null ? $imageUrl : $defaultImage,
            'name_of_guardian' => $request->guardianName,
            'guardian_address' => $request->guardianAddress,
            'guardian_phone' => $request->guardianContact,
            'barcode' => 'assets/images/memberBarcode/' . $nextMemberLibraryNo . '.jpeg',
        ]);

        
        // Get the authenticated user
        $user = Auth::user();

        // Created Audit Log For add member
        AuditLog::create([
            'user_id' => $user->id,  // Assuming the user is logged in
            'action' => 'Create',  // The activity type is 'create' since a new member is being added
            'type' => 'Member',
            'book_id' => null,      // Not applicable to this action
            'book_copy_id' => null,      // Not applicable
            'member_id' => $member->id,  // Reference the newly created member ID
            'activity_description' => $user->firstname . ' ' . $user->lastname . ' has added a new member: ' . $member->name . '.',
        ]);        

        // Create Notification for adding a new member
        Notification::create([
            'user_id' => $user->id,
            'book_id' => null,
            'book_copy_id' => null,
            'member_id' => $member->id,
            'user_role' => $user->role,
            'type' => 'Added a Member',
            'is_read' => false,
            'description' => $user->firstname . ' ' . $user->lastname . ' has added a new member: ' . $member->name . '.',
        ]);


        // Return success message
        return back()->with('success', 'New member added successfully!');
    }

    public function updateMemberinfo(Request $request, Member $member){

        $request->validate([
            'nameEdit' => 'required|string|max:255',
            'memberGroupEdit' => 'required|string',
            'courseEdit' => 'required|string',
            'student_noEdit' => 'required|string',
            'emailEdit' => 'required|email',
            'phoneEdit' => 'nullable|min:11',
            'addressEdit' => 'required|string|max:255',
            'imageFileEdit' => 'max:2048|mimes:jpeg,jpg,png,svg',
            'guardianNameEdit' => 'required|string|max:255',
            'guardianAddressEdit' => 'required|string|max:255',
            'guardianContactEdit' => 'nullable|min:11',
        ]);

        $user_image = $member->image_url;

        // Image file uploads
        $imageUrl = null;

        // Handle image uploads
        if ($request->hasFile('imageFileEdit')) {
            $imageFile = $request->file('imageFileEdit');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/images/memberImage/'), $imageName);
            $imageUrl = 'assets/images/memberImage/' . $imageName;
        }

        // Update member info
        $member->update([
            'name' => $request->nameEdit,
            'member_group' => $request->memberGroupEdit,
            'year_and_course' => $request->courseEdit,
            'student_no' => $request->student_noEdit,
            'email' => $request->emailEdit,
            'phone' => $request->phoneEdit,
            'address' => $request->addressEdit,
            'image_url' => $imageUrl ? $imageUrl : $user_image,
            'name_of_guardian' => $request->guardianNameEdit,
            'guardian_address' => $request->guardianAddressEdit,
            'guardian_phone' => $request->guardianContactEdit,
        ]);


        $user = Auth::user();

        // Create an audit log for updating member information
        AuditLog::create([
            'user_id' => $user->id,  // Assuming the user is logged in
            'action' => 'Update',  // The activity type is 'update' since member information is being updated
            'type' => 'Member',
            'book_id' => null,      // Not applicable
            'book_copy_id' => null,      // Not applicable
            'member_id' => $member->id,  // Reference the ID of the member whose info is being updated
            'activity_description' => $user->firstname . ' ' . $user->lastname . ' has updated the information of the member: ' . $member->name . '.',
        ]);

        
        // Create Notification for updating member information
        Notification::create([
            'user_id' => $user->id,
            'book_id' => null,  // Assuming book_id is not relevant here
            'book_copy_id' => null,
            'member_id' => $member->id,
            'user_role' => $user->role,
            'type' => 'Updated Member Details',
            'is_read' => false,
            'description' => $user->firstname . ' ' . $user->lastname . ' has updated the information for the member: ' . $member->name . '.',
        ]);



        return back()->with(['success' => 'Member info updated successfully!']);
    }
    
}
