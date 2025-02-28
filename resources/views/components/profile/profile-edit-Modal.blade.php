<div class="text-center">
    <button type="button" class="btn btn-primary w-25" id="editProfilebtn"
        style="min-width: fit-content; background-color: #193c71; border: none;"
        data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
</div>

<!-- Edit Profile Modal Structure -->
<div class="modal fade" id="editProfileModal" tabindex="-1"
aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Editable Profile Form inside the Modal -->
                <form action="{{ route('profile-edit') }}" method="post" enctype="multipart/form-data" id="updateProfileForm" >
                    @csrf

                    <div class="row pt-3">
                        <!-- Member Information Section -->
                        <div class="col-md-7">

                            <div class="mb-3">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control text-capitalize" name="first_name"
                                    value="{{ $user->firstname }}" id="first_name">
                                @error('first_name')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control text-capitalize" name="middle_name"
                                    value="{{ $user->middlename }}" id="middle_name">
                                @error('middle_name')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control text-capitalize" name="last_name"
                                    value="{{ $user->lastname }}" id="last_name">
                                @error('last_name')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="school_email">School Email</label>
                                <input type="text" class="form-control" name="school_email"
                                    value="{{ $user->school_email }}" id="school_email">
                                @error('school_email')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="personal_email">Account Email</label>
                                <input type="text" class="form-control" name="personal_email"
                                    value="{{ $user->email }}" id="personal_email">
                                @error('personal_email')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" class="form-control" name="contact_number"
                                    value="{{ $user->phone }}" id="contact_number">
                                @error('contact_number')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Profile Picture Section -->
                        <div class="col-md-5 text-center d-flex flex-column align-items-center">
                            <img id="profile-pic-2" class="profile-pic mb-3"
                                style="width: 150px; height: 150px; border-radius: 50%;"
                                src="{{ asset($user->image_url) }}">
                            <input type="file" class="form-control" name="user-profile"
                                accept="image/*" id="profile" value="{{ $user->image_url }}">
                            @error('user-profile')
                                <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" style="background-color: #193c71; border: none;"
                    class="btn btn-primary" id="updateModalbtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>

    <!-- Confirmation Modal -->
<div class="modal fade" id="UpdateconfirmationModal" tabindex="-1"
    aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmationModalLabel">Update Profile Confirmation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to change the information?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal" id="cancelConfirmationBtn">Cancel</button>
                <button type="button" class="btn btn-primary"
                    style="background-color: #193c71; border: none;" id="confirmUpdate"
                    data-bs-dismiss="modal">Update</button>
            </div>
        </div>
    </div>
</div>


{{-- Confimation Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Show modal if there are validation errors
        if (@json($errors->has('first_name'))||@json($errors->has('middle_name'))||@json($errors->has('last_name'))||
            @json($errors->has('school_email'))||@json($errors->has('personal_email'))||@json($errors->has('contact_number'))||
            @json($errors->has('user-profile'))){
                
            $('#editProfileModal').modal('show');

        }
        
        // Open the confirmation modal when "Add Book" button is clicked
        document.getElementById('updateModalbtn').addEventListener('click', function() {
            // Hide the 'Add Book' modal and show the confirmation modal
            $('#editProfileModal').modal('hide');
            $('#UpdateconfirmationModal').modal('show');
        });

        // Submit form when confirmation modal confirms the action
        document.getElementById('confirmUpdate').addEventListener('click', function() {
            // Submit the form
            document.getElementById('updateProfileForm').submit();
        });


        // If the user cancels, return to the 'Add Book' modal
        document.getElementById('cancelConfirmationBtn').addEventListener('click', function() {
            $('#editProfileModal').modal('show');
            $('#UpdateconfirmationModal').modal('hide');
        });

        // Ensure the 'Add Book' modal opens again if confirmation modal is closed
        $('#UpdateconfirmationModal').on('hidden.bs.modal', function () {
            $('#editProfileModal').modal('show');
        });


        // Select all input fields and the "Save Changes" button
        const inputs = document.querySelectorAll('#updateProfileForm input');
        const saveButton = document.getElementById('updateModalbtn');
        let initialValues = {}; // Store initial values of the inputs

        // Store the initial values of the inputs
        inputs.forEach(input => {
            initialValues[input.name] = input.value;
        });

        // Function to check if any input value has changed
        function checkChanges() {
            let hasChanges = false;

            inputs.forEach(input => {
                if (input.value !== initialValues[input.name]) {
                    hasChanges = true;
                }
            });

            // Enable/Disable the save button based on whether there are changes
            saveButton.disabled = !hasChanges;
        }

        // Add event listeners to the inputs to track changes
        inputs.forEach(input => {
            input.addEventListener('input', checkChanges);
        });

        // Initial check on page load to ensure the button state is correct
        checkChanges();
    });
</script>

