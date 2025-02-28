<div class="text-center d-flex justify-content-center align-items-center">
    <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#changePasswordModal"
        style="min-width: fit-content; min-height: fit-content; background-color: #193c71; border: none;">
        Change Password
    </button>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Your Password</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('changePassword') }}" method="post" id="changePasswordForm">
                    @csrf
                
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password*</label>
                        <div class="input-group">
                            <input type="password" style="font-size: .9rem;" class="form-control" id="current_password" name="current_password" required>
                            <span class="input-group-text" id="toggleCurrentPassword" style="cursor: pointer;">
                                <i class="bi bi-eye-slash"></i> <!-- Eye icon to toggle visibility -->
                            </span>
                        </div>
                        @error('current_password')
                            <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password*</label>
                        <div class="input-group">
                            <input type="password" style="font-size: .9rem;" class="form-control" id="new_password" name="new_password" required>
                            <span class="input-group-text" id="toggleNewPassword" style="cursor: pointer;">
                                <i class="bi bi-eye-slash"></i> <!-- Eye icon to toggle visibility -->
                            </span>
                        </div>
                        @error('new_password')
                            <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password*</label>
                        <div class="input-group">
                            <input type="password" style="font-size: .9rem;" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                            <span class="input-group-text" id="toggleNewPasswordConfirmation" style="cursor: pointer;">
                                <i class="bi bi-eye-slash"></i> <!-- Eye icon to toggle visibility -->
                            </span>
                        </div>
                        @error('new_password_confirmation')
                            <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                        @enderror
                    </div>
                
                </form>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitChangePasswordBtn" style="background-color: #193c71; color: #fff;">Change Password</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="updatePasswordConfirmationModal" tabindex="-1"
    aria-labelledby="confirmationPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmationPasswordModalLabel">Update Password Confirmation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to change the password?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal" id="cancelPasswordConfirmationBtn">Cancel</button>
                <button type="button" class="btn btn-primary"
                    style="background-color: #193c71; border: none;" id="confirmUpdatePassword"
                    data-bs-dismiss="modal">Update</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function (){

        if (@json($errors->has('new_password'))||@json($errors->has('new_password_confirmation'))){
                
            $('#changePasswordModal').modal('show');

        }

        // Open the confirmation modal when "Add Book" button is clicked
        document.getElementById('submitChangePasswordBtn').addEventListener('click', function() {

            $('#changePasswordModal').modal('hide');
            $('#updatePasswordConfirmationModal').modal('show');

        });

        // Submit form when confirmation modal confirms the action
        document.getElementById('confirmUpdatePassword').addEventListener('click', function() {

            document.getElementById('changePasswordForm').submit();

        });

        // If the user cancels, return to the 'Add Book' modal
        document.getElementById('cancelPasswordConfirmationBtn').addEventListener('click', function() {
         
            $('#changePasswordModal').modal('show');
            $('#updatePasswordConfirmationModal').modal('hide');

        });

        // Ensure the 'Add Book' modal opens again if confirmation modal is closed
        $('#updatePasswordConfirmationModal').on('hidden.bs.modal', function () {
            $('#changePasswordModal').modal('show');
        });


        // For input toggle eye icon
        // Select the elements
        const toggleCurrentPassword = document.getElementById('toggleCurrentPassword');
        const toggleNewPassword = document.getElementById('toggleNewPassword');
        const toggleNewPasswordConfirmation = document.getElementById('toggleNewPasswordConfirmation');
        
        const currentPasswordInput = document.getElementById('current_password');
        const newPasswordInput = document.getElementById('new_password');
        const newPasswordConfirmationInput = document.getElementById('new_password_confirmation');

        // Toggle visibility for current password
        toggleCurrentPassword.addEventListener('click', function () {
            if (currentPasswordInput.type === 'password') {
                currentPasswordInput.type = 'text';
                toggleCurrentPassword.innerHTML = '<i class="bi bi-eye"></i>';
            } else {
                currentPasswordInput.type = 'password';
                toggleCurrentPassword.innerHTML = '<i class="bi bi-eye-slash"></i>';
            }
        });

        // Toggle visibility for new password
        toggleNewPassword.addEventListener('click', function () {
            if (newPasswordInput.type === 'password') {
                newPasswordInput.type = 'text';
                toggleNewPassword.innerHTML = '<i class="bi bi-eye"></i>';
            } else {
                newPasswordInput.type = 'password';
                toggleNewPassword.innerHTML = '<i class="bi bi-eye-slash"></i>';
            }
        });

        // Toggle visibility for new password confirmation
        toggleNewPasswordConfirmation.addEventListener('click', function () {
            if (newPasswordConfirmationInput.type === 'password') {
                newPasswordConfirmationInput.type = 'text';
                toggleNewPasswordConfirmation.innerHTML = '<i class="bi bi-eye"></i>';
            } else {
                newPasswordConfirmationInput.type = 'password';
                toggleNewPasswordConfirmation.innerHTML = '<i class="bi bi-eye-slash"></i>';
            }
        });
    });

</script>
