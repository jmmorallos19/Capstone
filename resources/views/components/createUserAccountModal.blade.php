<!-- Modal -->
<div class="modal fade" id="createUserAccountModal" tabindex="-1" aria-labelledby="createUserAccountModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #193c71; color: #fff;">
        <h1 class="modal-title fs-5" id="createUserAccountModalLabel">Create Staff Account</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('createUserAccount') }}" method="post" id="createUserForm" enctype="multipart/form-data">
          @csrf
          
          <!-- Personal Information Section -->
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="firstName" class="form-label">First Name*</label>
                <input type="text" class="form-control" id="firstName" name="userFirstname" value="{{ old('userFirstname') }}">
                @error('userFirstname')
                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="mb-3">
                <label for="middleName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middleName" name="userMiddlename" value="{{ old('userMiddlename') }}">
                @error('userMiddlename')
                     <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                 @enderror
              </div>
        
              <div class="mb-3">
                <label for="lastName" class="form-label">Last Name*</label>
                <input type="text" class="form-control" id="lastName" name="userLastname" value="{{ old('userLastname') }}">
                @error('userLastname')
                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                @enderror
              </div>
        
              
            </div>
        
            <div class="col-md-6">
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="userPhone" value="{{ old('userPhone') }}">
                @error('userPhone')
                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="schoolEmail" class="form-label">School Email*</label>
                <input type="email" class="form-control" id="schoolEmail" name="staff_school_email" value="{{ old('staff_school_email') }}">
                @error('staff_school_email')
                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                @enderror
              </div>
            </div>

          </div>
        
          <!-- Separator with Text in the Middle -->
          <hr class="separator">
          <div class="text-center text-uppercase">Account Information</div>
          <hr class="separator">
        
          <!-- Account Information Section -->
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="accountEmail" class="form-label">Account Email*</label>
                <input type="email" class="form-control" id="accountEmail" name="staff_email" value="{{ old('staff_email') }}">
                @error('staff_email')
                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="mb-3">
                <label for="user_password" class="form-label">Password*</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="user_password" name="userPassword">
                    <span class="input-group-text" id="togglePassword">
                        <i class="bi bi-eye-slash" id="togglePasswordIcon"></i>
                    </span>
                </div>
                @error('userPassword')
                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                @enderror
            </div>
            
            </div>
        
            <div class="col-md-6">
              <div class="mb-3">
                <label for="user_confirmPassword" class="form-label">Confirm Password*</label>
                  <div class="input-group">
                      <input type="password" class="form-control" id="user_confirmPassword" name="userPassword_confirmation">
                      <span class="input-group-text" id="toggleConfirmPassword">
                          <i class="bi bi-eye-slash" id="toggleConfirmPasswordIcon"></i>
                      </span>
                  </div>
                  @error('userPassword')
                      <div class="text-danger pt-1" style="font-size: .9rem">The password confirmation does not match the entered password.</div>
                  @enderror
              </div>
        
              <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image" name="userProfilePicture">
                @error('userProfilePicture')
                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="createUserAccountBtn" class="btn" style="background-color: #193c71; color: #fff;">Create account</button>
      </div>
    </div>
  </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="createUserAccountConfirmModal" tabindex="-1" aria-labelledby="createUserAccountconfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header" style="background-color: #193c71; color: #fff;">
              <h5 class="modal-title" id="createUserAccountconfirmModalLabel">Account Confirmation</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                  aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Are you sure you want to create new user?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="cancelcreateUserAccountConfirmationBtn" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="confirmcreateUserAccountSubmit" style="background-color: #193c71; color: #fff;">Yes</button>
          </div>
      </div>
  </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function (){

      if (@json($errors->has('userFirstname')) || @json($errors->has('userMiddlename')) || @json($errors->has('userFLastname')) ||
          @json($errors->has('userPhone')) || @json($errors->has('staff_email')) || @json($errors->has('staff_school_email')) ||
          @json($errors->has('userPassword')) || @json($errors->has('userPassword_confirmation')) || @json($errors->has('userProfilePicture'))) {
          $('#createUserAccountModal').modal('show');
      }

      document.getElementById('createUserAccountBtn')?.addEventListener('click', function() {
            $('#createUserAccountModal').modal('hide'); 
            $('#createUserAccountConfirmModal').modal('show');  // Show the confirmation modal
        });

      
        document.getElementById('confirmcreateUserAccountSubmit')?.addEventListener('click', function() {
            document.getElementById('createUserForm').submit();
        });

      
        document.getElementById('cancelcreateUserAccountConfirmationBtn')?.addEventListener('click', function() {
            $('#createUserAccountModal').modal('show');  // Show the "Add Book" modal
            $('#createUserAccountConfirmModal').modal('hide');  // Hide the confirmation modal
        });

      
        $('#createUserAccountConfirmModal').on('hidden.bs.modal', function () {
            $('#createUserAccountModal').modal('show');
        });

    });

    // Toggle password visibility for password field
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('user_password');
        const icon = document.getElementById('togglePasswordIcon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        }
    });

    // Toggle password visibility for confirm password field
    document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
        const confirmPasswordField = document.getElementById('user_confirmPassword');
        const icon = document.getElementById('toggleConfirmPasswordIcon');
        
        if (confirmPasswordField.type === 'password') {
            confirmPasswordField.type = 'text';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        } else {
            confirmPasswordField.type = 'password';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        }
    });
</script>