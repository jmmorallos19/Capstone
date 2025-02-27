<!-- Edit Profile Modal Structure -->
<div class="modal fade" id="editStaffProfileModal" tabindex="-1"
aria-labelledby="editStaffProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="editStaffProfileModalLabel">Edit Staff Info</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Editable Profile Form inside the Modal -->
                <form action="{{ route('updateStaffInfo', $staff->id) }}" method="post" enctype="multipart/form-data" id="updateStaffInfoForm" >
                    @csrf
                    @method('PUT')

                    <div class="row pt-3">
                        <!-- Member Information Section -->
                        <div>

                            <div class="mb-3">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control text-capitalize" name="first_name"
                                    value="{{ $staff->firstname }}" id="first_name">
                                @error('first_name')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control text-capitalize" name="middle_name"
                                    value="{{ $staff->middlename }}" id="middle_name">
                                @error('middle_name')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control text-capitalize" name="last_name"
                                    value="{{ $staff->lastname }}" id="last_name">
                                @error('last_name')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="school_email">School Email</label>
                                <input type="text" class="form-control" name="staff_school_email"
                                    value="{{ $staff->staff_school_email }}" id="school_email">
                                @error('school_email')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="personal_email">Account Email</label>
                                <input type="text" class="form-control" name="staff_email"
                                    value="{{ $staff->staff_email }}" id="personal_email">
                                @error('personal_email')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" class="form-control" name="contact_number"
                                    value="{{ $staff->phone }}" id="contact_number">
                                @error('contact_number')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" style="background-color: #193c71; border: none;"
                    class="btn btn-primary" id="updateStaffInfoModalbtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>

    <!-- Confirmation Modal -->
<div class="modal fade" id="updateStaffInfoConfirmationModal" tabindex="-1"
    aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmationModalLabel">Update Staff Information Confirmation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to update the staff profile information?
            </div>            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal" id="cancelStaffInfoConfirmationBtn">Cancel</button>
                <button type="button" class="btn btn-primary"
                    style="background-color: #193c71; border: none;" id="confirmUpdateStaffInfo"
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
            @json($errors->has('staff_email'))||@json($errors->has('staff_email'))||@json($errors->has('contact_number'))){
                
            $('#editProfileModal').modal('show');

        }
        
        // Open the confirmation modal when "Add Book" button is clicked
        document.getElementById('updateStaffInfoModalbtn').addEventListener('click', function() {
            // Hide the 'Add Book' modal and show the confirmation modal
            $('#editStaffProfileModal').modal('hide');
            $('#updateStaffInfoConfirmationModal').modal('show');
        });

        // Submit form when confirmation modal confirms the action
        document.getElementById('confirmUpdateStaffInfo').addEventListener('click', function() {
            // Submit the form
            document.getElementById('updateStaffInfoForm').submit();
        });


        // If the user cancels, return to the 'Add Book' modal
        document.getElementById('cancelStaffInfoConfirmationBtn').addEventListener('click', function() {
            $('#editStaffProfileModal').modal('show');
            $('#updateStaffInfoConfirmationModal').modal('hide');
        });

        // Ensure the 'Add Book' modal opens again if confirmation modal is closed
        $('#updateStaffInfoConfirmationModal').on('hidden.bs.modal', function () {
            $('#editStaffProfileModal').modal('show');
        });


        // Select all input fields and the "Save Changes" button
        const inputs = document.querySelectorAll('#updateStaffInfoForm input');
        const saveButton = document.getElementById('updateStaffInfoModalbtn');
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