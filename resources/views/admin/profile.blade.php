<x-admin-layout>
    <div class="col p-0 overflow-auto table-container" style="max-height: fit-content; background-color: #fff;">
        <div class="col col-12 ps-2" style="background-color: #193c71;">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" style="border-bottom: 4px solid #193c71;" role="tablist">
                <li class="nav-item text-uppercase border-0">
                    <a class="nav-link active" style="font-size: .9rem;" id="info-tab" data-bs-toggle="tab" href="#info"
                        role="tab">Info</a>
                </li>
            </ul>
        </div>

        <div class="tab-content info_div">
            <!-- Info Tab -->
            <div class="tab-pane fade show active" style="padding-bottom: 4rem" id="info" role="tabpanel"
                aria-labelledby="info-tab">
                <div class="container">
                    <form enctype="multipart/form-data" method="POST" action="process_form.php">
                        <div class="row pt-5">
                            <!-- Member Information Section -->
                            <div class="col-md-9">
                                <h4 class="mb-4">Personal Information</h4>
                                <div class="row">
                                    <!-- Static Data for Member Information -->
                                    <div class="col-md-4 mb-3">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control text-capitalize" id="first_name" name="first_name"
                                            value="{{ $user->firstname }}" style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" class="form-control text-capitalize" id="middle_name" name="middle_name"
                                            value="{{ $user->middlename }}" style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control text-capitalize" id="last_name" name="last_name"
                                            value="{{ $user->lastname }}" style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="school_email">School Email</label>
                                        <input type="text" class="form-control" id="school_email" name="school_email"
                                            value="{{ $user->school_email }}" style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="personal_email">Account Email</label>
                                        <input type="text" class="form-control" id="personal_email"
                                            name="personal_email" value="{{ $user->email }}"
                                            style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="contact_number">Contact Number</label>
                                        <input type="text" class="form-control" id="contact_number"
                                            name="contact_number" value="{{ $user->phone }}"
                                            style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="role">Role/s</label>

                                        <input type="text" class="form-control text- text-capitalize" id="role" name="role"
                                            value="{{ $user->role }}" style="background-color: white;" readonly>


                                    </div>
                                </div>
                            </div>

                            <!-- Profile Picture -->
                            <div class="col-md-3 text-center d-flex flex-column align-items-center">
                                <img src="{{ asset($user->image_url) }}" id="profile-pic"
                                    class="profile-pic mb-3"
                                    style="width: 200px; height: 200px; border-radius: 50%;">
                            </div>
                        </div>

                        <hr>

                        <!-- Account Security Section -->
                        <div>
                            <h4 class="mb-4">Account Security</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="current_passwords">Current Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="current_passwords"
                                            name="current_passwords" placeholder="Current Password"
                                            style="background-color: white;" readonly>
                                        <span class="input-group-text"
                                            onclick="togglePassword('current_password', this)">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="new_passwords">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="new_passwords"
                                            name="new_passwords" placeholder="New Password"
                                            style="background-color: white;" readonly>
                                        <span class="input-group-text" onclick="togglePassword('new_password', this)">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="confirm_password">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" placeholder="Confirm Password"
                                            style="background-color: white;" readonly>
                                        <span class="input-group-text"
                                            onclick="togglePassword('confirm_password', this)">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="w-100 d-flex flex-row align-items-center justify-content-end gap-2 mt-4">
                        {{-- Edit Profile Modal --}}
                        @includeIf('components.profile.profile-edit-modal')

                        {{-- Change Password Modal --}}
                        @includeIf('components.profile.change-password')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>