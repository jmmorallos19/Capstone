<x-admin-layout>

    <div class="col p-0 overflow-auto table-container" style="background-color: #fff;">
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
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            value="John" style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                                            value="Doe" style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            value="Smith" style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="school_email">School Email</label>
                                        <input type="text" class="form-control" id="school_email" name="school_email"
                                            value="john.smith@school.com" style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="personal_email">Personal Email</label>
                                        <input type="text" class="form-control" id="personal_email"
                                            name="personal_email" value="johnsmith@gmail.com"
                                            style="background-color: white;" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="contact_number">Contact Number</label>
                                        <input type="text" class="form-control" id="contact_number"
                                            name="contact_number" value="123-456-7890" style="background-color: white;"
                                            readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="role">Role/s</label>
                                        <input type="text" class="form-control" id="role" name="role"
                                            value="Admin/Librarian" style="background-color: white;" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Profile Picture -->
                            <div class="col-md-3 text-center d-flex flex-column align-items-center">
                                <img src="{{ asset('assets/images/uploads/default_image.jpg') }}" id="profile-pic"
                                    class="profile-pic mb-3"
                                    style="width: 200px; height: 200px; border: 1px solid gray; border-radius: 50%;">
                            </div>
                        </div>

                        <hr>

                        <!-- Account Security Section -->
                        <div>
                            <h4 class="mb-4">Account Security</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="current_password">Current Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" placeholder="Current Password"
                                            style="background-color: white;" readonly>
                                        <span class="input-group-text"
                                            onclick="togglePassword('current_password', this)">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="new_password">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="new_password"
                                            name="new_password" placeholder="New Password"
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
                        <!-- Edit Profile Button -->
                        <div class="text-center">
                            <button type="button" class="btn btn-primary w-25"
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
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Editable Profile Form inside the Modal -->
                                        <form enctype="multipart/form-data" id="profileForm">
                                            <div class="row pt-3">
                                                <!-- Member Information Section -->
                                                <div class="col-md-7">
                                                    <!-- Static Profile Fields (Editable) -->
                                                    <div class="mb-3">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" class="form-control" name="first_name"
                                                            value="John" id="first_name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="middle_name">Middle Name</label>
                                                        <input type="text" class="form-control" name="middle_name"
                                                            value="Doe" id="middle_name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name"
                                                            value="Smith" id="last_name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="school_email">School Email</label>
                                                        <input type="text" class="form-control" name="school_email"
                                                            value="john.smith@school.com" id="school_email">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="personal_email">Personal Email</label>
                                                        <input type="text" class="form-control" name="personal_email"
                                                            value="johnsmith@gmail.com" id="personal_email">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="contact_number">Contact Number</label>
                                                        <input type="text" class="form-control" name="contact_number"
                                                            value="123-456-7890" id="contact_number">
                                                    </div>
                                                </div>

                                                <!-- Profile Picture Section -->
                                                <div class="col-md-5 text-center d-flex flex-column align-items-center">
                                                    <img id="profile-pic-2" class="profile-pic mb-3"
                                                        style="width: 150px; height: 150px; border-radius: 50%; background-size: cover; background-position: center; border: 1px solid #193c71;"
                                                        src="assets/images/default_image.jpg">
                                                    <input type="file" class="form-control" name="profile_pic"
                                                        accept="image/*" id="profile_pic">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" style="background-color: #193c71; border: none;"
                                            class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#confirmationModal">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Confirmation Modal -->
                        <div class="modal fade" id="confirmationModal" tabindex="-1"
                            aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #193c71; color: #fff;">
                                        <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to change the information?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary"
                                            style="background-color: #193c71; border: none;" id="confirmUpdate"
                                            data-bs-dismiss="modal">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary w-25" style="min-width: fit-content; min-height: fit-content; background-color: #193c71; border: none;">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-admin-layout>