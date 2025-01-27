document.getElementById('profileForm').onsubmit = function(event) {
    event.preventDefault();

    // Hide the editProfileModal before showing the confirmation modal
    const editProfileModal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
    if (editProfileModal) {
        editProfileModal.hide();
    }

    // Show the confirmation modal
    new bootstrap.Modal(document.getElementById('confirmationModal')).show();
};

// Handle confirmation action
document.getElementById('confirmUpdate').onclick = function() {
    document.getElementById('profileForm').submit();
};

// Reset form display if modal is closed without confirmation
const closeButtons = document.querySelectorAll('.btn-close');
closeButtons.forEach(btn => {
    btn.onclick = function() {
        document.getElementById('profileForm').style.display = 'block';
    };
});

// Reset form display if confirmation modal is hidden without confirmation
document.getElementById('confirmationModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('profileForm').style.display = 'block';
});

// Preview selected image
document.querySelector('input[name="profile_pic"]').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const profilePic = document.getElementById('profile-pic-2');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            profilePic.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        // Reset to default image if no file is selected
        profilePic.src = 'assets/images/pfp.jpg'; // Replace with the path to your default image
    }
});

function togglePassword(inputId, icon) {
    const input = document.getElementById(inputId);
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    icon.innerHTML = isPassword ? '<i class="bi bi-eye-slash" style="font-size: .9rem;"></i>' : '<i class="bi bi-eye" style="font-size: .9rem;"></i>';
}

document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const profilePic = document.getElementById('profile-pic');
    const defaultImage = 'assets/images/pfp.jpg';

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            profilePic.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        profilePic.src = defaultImage;
    }
});