<!-- Modal (Popup Form) -->
<div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title fw-bold" id="addBookModalLabel">Add Member</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="addMemberForm">
                <!-- Form to Add New User -->
                <form action="{{ route('addMember') }}" method="post" id="memberForm" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="member_form" value="1"> <!-- Hidden field to identify the book form -->

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <!-- Member No. Field -->
                            <div class="mb-3">
                                <label for="libraryNo" class="form-label">Library Card No.*</label>
                                <input type="text" class="form-control" id="libraryNo" name="library_card_no" value="{{ $nextMemberLibraryNo ?? '2025-0001' }}" readonly> 
                                @error('library_card_no')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">FullName*</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Member Group Field -->
                            <div class="mb-3">
                                <label for="memberGroup" class="form-label">Member Group*</label>
                                <select class="form-select" id="memberGroup" name="memberGroup">
                                    <option value="" selected>Select Group</option>
                                    <option value="Basic Education" {{ old('memberGroup') == 'Basic Education' ? 'selected' : '' }}>Basic Education</option>
                                    <option value="Senior High School" {{ old('memberGroup') == 'Senior High School' ? 'selected' : '' }}>Senior High School</option>
                                    <option value="College" {{ old('memberGroup') == 'College' ? 'selected' : '' }}>College</option>
                                    <option value="Faculty" {{ old('memberGroup') == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                                </select>
                                @error('memberGroup')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                            

                            <!-- Course Field -->
                            <div class="mb-3">
                                <label for="course" id="course_label" class="form-label">Year & Course*</label>
                                <input type="text" class="form-control" id="course" name="course" value="{{ old('course')}}">
                                @error('course')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Student No. Field -->
                            <div class="mb-3">
                                <label for="student_no." id="student_no_label" class="form-label">Student No.*</label>
                                <input type="text" class="form-control" id="student_no." name="student_no" value="{{ old('student_no')}}">
                                @error('student_no')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">School Email*</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                                @error('email')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <!-- Phone Field (PH format) -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" pattern="^(09|\+639)\d{9}$" title="Please enter a valid PH phone number (e.g., 09123456789 or +639123456789)" value="{{ old('phone')}}" maxlength="13">
                                @error('phone')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Address Field -->
                            <div class="mb-3">
                                <label for="address" class="form-label">Address*</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address')}}">
                                @error('address')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Guardian Name Field -->
                            <div class="mb-3">
                                <label for="guardianName" class="form-label">Name of Guardian*</label>
                                <input type="text" class="form-control" id="guardianName" name="guardianName" value="{{ old('guardianName')}}"> 
                                @error('guardianName')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Guardian Address Field -->
                            <div class="mb-3">
                                <label for="guardianAddress" class="form-label">Guardian Address*</label>
                                <input type="text" class="form-control" id="guardianAddress" name="guardianAddress" value="{{ old('guardianAddress')}}">
                                @error('guardianAddress')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Guardian Contact Field -->
                            <div class="mb-3">
                                <label for="guardianContact" class="form-label">Guardian Contact</label>
                                <input type="text" class="form-control" id="guardianContact" name="guardianContact" pattern="^(09|\+639)\d{9}$" title="Please enter a valid PH phone number (e.g., 09123456789 or +639123456789)" value="{{ old('guardianContact')}}" maxlength="13">
                                @error('guardianContact')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="imageFile" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="imageFile" name="imageFile" value="{{ old('imageFile') }}">
                                @error('imageFile')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>

                    <!-- Submit Button (disabled until confirmation) -->
                    <div class="modal-footer pe-0 ps-0 pb-0">
                        <button type="button" id="confirmAddMemberBtn" style="background-color: #193c71" class="btn btn-success">Add Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal (Confirmation) -->
<div class="modal fade" id="memberConfirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Add Member</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to add this Member?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelConfirmation">Cancel</button>
                <button type="button" class="btn btn-primary" id="memberConfirmSubmit" style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Wait for DOM content to load
    document.addEventListener('DOMContentLoaded', function () {
        // Show Member Modal if there are any errors in the member-related fields
      
            if (@json($errors->has('library_card_no')) || @json($errors->has('name')) || @json($errors->has('memberGroup')) ||
                @json($errors->has('course')) || @json($errors->has('student_no')) || @json($errors->has('email')) ||
                @json($errors->has('phone')) || @json($errors->has('address')) || @json($errors->has('imageFile')) ||
                @json($errors->has('guardianName')) || @json($errors->has('guardianAddress')) || @json($errors->has('guardianContact'))) {
                   
                    $('#addMemberModal').modal('show');

             }
        
        // Member Form - Show confirmation modal when "Add Member" button is clicked
        document.getElementById('confirmAddMemberBtn')?.addEventListener('click', function() {
            $('#addMemberModal').modal('hide');  // Hide the "Add Member" modal
            $('#memberConfirmModal').modal('show');  // Show the confirmation modal
        });

        // Submit Member Form when confirmation modal confirms the action
        document.getElementById('memberConfirmSubmit')?.addEventListener('click', function() {
            document.getElementById('memberForm').submit();
        });

        // Cancel Member Form submission, re-show the "Add Member" modal
        document.getElementById('cancelMemberConfirmation')?.addEventListener('click', function() {
            $('#addMemberModal').modal('show');  // Show the "Add Member" modal
            $('#memberConfirmModal').modal('hide');  // Hide the confirmation modal
        });

        // Add Member - Ensure the "Add Member" modal reappears if the confirmation modal is closed
        $('#memberConfirmModal').on('hidden.bs.modal', function () {
            $('#addMemberModal').modal('show');
        });

        let memberGroup = document.getElementById('memberGroup');
        let student_no_label = document.getElementById('student_no_label');
        let course_label = document.getElementById('course_label');

        memberGroup.addEventListener('change', function () {
        
            if (memberGroup.value === 'Faculty') {
                student_no_label.textContent = 'Employee No.*';
                course_label.textContent = 'Department*';
            } else {
                student_no_label.textContent = 'Student No.*';
                course_label.textContent = 'Year & Course*';
                
            }

        })
    });
</script>

