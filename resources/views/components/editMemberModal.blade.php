<!-- Modal (Popup Form) -->
<div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title fw-bold" id="editBookModalLabel">Edit Member Info</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="editMemberForm">
                <!-- Form to Add New User -->
                <form action="{{ route('updateMemberinfo', $member->id) }}" method="post" id="memberEditForm" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="member_form" value="1"> <!-- Hidden field to identify the book form -->

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <!-- Member No. Field -->
                            <div class="mb-3">
                                <label for="libraryNo" class="form-label">Library Card No.*</label>
                                <input type="text" class="form-control" id="libraryNo" name="library_card_noEdit" value="{{ $member->library_card_no }}" readonly> 
                                @error('library_card_noEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">FullName*</label>
                                <input type="text" class="form-control" id="name" name="nameEdit" value="{{ $member->name }}">
                                @error('nameEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Member Group Field -->
                            <div class="mb-3">
                                <label for="memberGroup" class="form-label">Member Group*</label>
                                <select class="form-select" id="memberGroup" name="memberGroupEdit">
                                    <option value="" selected>Select Group</option>
                                    <option value="Basic Education" {{ $member->member_group == 'Basic Education' ? 'selected' : '' }}>Basic Education</option>
                                    <option value="Senior High School" {{ $member->member_group == 'Senior High School' ? 'selected' : '' }}>Senior High School</option>
                                    <option value="College" {{ $member->member_group == 'College' ? 'selected' : '' }}>College</option>
                                    <option value="Faculty" {{ $member->member_group == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                                </select>
                                @error('memberGroupEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                            

                            <!-- Course Field -->
                            <div class="mb-3">
                                @if ($member->member_group == 'Faculty')
                                    <label for="course" class="form-label">Department*</label>
                                @else
                                    <label for="course" class="form-label">Year and Course*</label>
                                @endif
                                <input type="text" class="form-control" id="course" name="courseEdit" value="{{ $member->year_and_course }}">
                                @error('courseEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Student No. Field -->
                            <div class="mb-3">
                                @if ($member->member_group == 'Faculty')
                                    <label for="student_no." class="form-label">Employee No.*</label>
                                @else
                                    <label for="student_no." class="form-label">Student No.*</label>
                                @endif
                                <input type="text" class="form-control" id="student_no." name="student_noEdit" value="{{ $member->student_no }}">
                                @error('student_noEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">School Email*</label>
                                <input type="email" class="form-control" id="email" name="emailEdit" value="{{ $member->email }}">
                                @error('emailEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <!-- Phone Field (PH format) -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phoneEdit" pattern="^(09|\+639)\d{9}$" title="Please enter a valid PH phone number (e.g., 09123456789 or +639123456789)" value="{{ $member->phone }}" maxlength="13">
                                @error('phoneEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Address Field -->
                            <div class="mb-3">
                                <label for="address" class="form-label">Address*</label>
                                <input type="text" class="form-control" id="address" name="addressEdit" value="{{ $member->address }}">
                                @error('addressEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Guardian Name Field -->
                            <div class="mb-3">
                                <label for="guardianName" class="form-label">Name of Guardian*</label>
                                <input type="text" class="form-control" id="guardianName" name="guardianNameEdit" value="{{ $member->name_of_guardian }}"> 
                                @error('guardianNameEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Guardian Address Field -->
                            <div class="mb-3">
                                <label for="guardianAddress" class="form-label">Guardian Address*</label>
                                <input type="text" class="form-control" id="guardianAddress" name="guardianAddressEdit" value="{{ $member->guardian_address }}">
                                @error('guardianAddressEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Guardian Contact Field -->
                            <div class="mb-3">
                                <label for="guardianContact" class="form-label">Guardian Contact</label>
                                <input type="text" class="form-control" id="guardianContact" name="guardianContactEdit" pattern="^(09|\+639)\d{9}$" title="Please enter a valid PH phone number (e.g., 09123456789 or +639123456789)" value="{{ $member->guardian_phone }}" maxlength="13">
                                @error('guardianContactEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="imageFile" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="imageFile" name="imageFileEdit" >
                                @error('imageFileEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>

                    <!-- Submit Button (disabled until confirmation) -->
                    <div class="modal-footer pe-0 ps-0 pb-0">
                        <button type="button" id="confirmEditMemberBtn" style="background-color: #193c71" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal (Confirmation) -->
<div class="modal fade" id="memberEditConfirmModal" tabindex="-1" aria-labelledby="confirmEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmEditModalLabel">Confirm Member Update</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to update information?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelEditMemberConfirmation">Cancel</button>
                <button type="button" class="btn btn-primary" id="memberEditConfirmSubmit" style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {
        
        if (@json($errors->has('library_card_noEdit')) || @json($errors->has('nameEdit')) || @json($errors->has('memberGroupEdit')) ||
            @json($errors->has('courseEdit')) || @json($errors->has('student_noEdit')) || @json($errors->has('emailEdit')) ||
            @json($errors->has('phoneEdit')) || @json($errors->has('addressEdit')) || @json($errors->has('imageFileEdit')) ||
            @json($errors->has('guardianNameEdit')) || @json($errors->has('guardianAddressEdit')) || @json($errors->has('guardianContactEdit'))) {
               
                $('#editMemberModal').modal('show');
                
         }

        // Member Form - Show confirmation modal when "Add Member" button is clicked
        document.getElementById('confirmEditMemberBtn')?.addEventListener('click', function() {
            $('#editMemberModal').modal('hide');  // Hide the "Add Member" modal
            $('#memberEditConfirmModal').modal('show');  // Show the confirmation modal
        });

        // Submit Member Form when confirmation modal confirms the action
        document.getElementById('memberEditConfirmSubmit')?.addEventListener('click', function() {
            document.getElementById('memberEditForm').submit();
        });

        // Cancel Member Form submission, re-show the "Add Member" modal
        document.getElementById('cancelEditMemberConfirmation')?.addEventListener('click', function() {
            $('#editMemberModal').modal('show');  // Show the "Add Member" modal
            $('#memberConfirmModal').modal('hide');  // Hide the confirmation modal
        });

        // Add Member - Ensure the "Add Member" modal reappears if the confirmation modal is closed
        $('#memberConfirmModal').on('hidden.bs.modal', function () {
            $('#editMemberModal').modal('show');
        });


        // Select all input fields and the "Save Changes" button
        const inputs = document.querySelectorAll('#editMemberForm input, #editMemberForm select');
        const saveButton = document.getElementById('confirmEditMemberBtn');
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