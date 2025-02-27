<a href="#" class="btn btn-danger btn-sm" id="deleteUserBtn" style="font-size: .9rem;" 
   data-bs-toggle="modal" data-bs-target="#deleteUserConfirmModal" 
   data-url="{{ route('deleteUser', $stafflist->id) }}">
    <i class="bi bi-trash3"></i>
</a>


<!-- Confirmation Modal -->
<div class="modal fade" id="deleteUserConfirmModal" tabindex="-1" aria-labelledby="confirmDeleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmDeleteUserModalLabel">Staff Account Deletion Confirmation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-danger" style="width: 100%;">
                <p style="font-size: 1rem; word-wrap: break-word; white-space: normal;">
                    <strong>Warning:</strong> This action will permanently delete the staff account. Are you sure you want to proceed? This cannot be undone.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelDeleteUserConfirmationBtn" data-bs-dismiss="modal">Cancel</button>
                <a id="confirmDeleteUserSubmit" href="#" class="btn btn-primary" style="background-color: #193c71; color: #fff;">Yes</a>
            </div>
        </div>
    </div>
</div>



<script>
    // When the modal is about to be shown
    var deleteUserConfirmModal = document.getElementById('deleteUserConfirmModal');
    deleteUserConfirmModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // The button that triggered the modal
        var url = button.getAttribute('data-url'); // Get the URL from the data-url attribute
        var confirmDeleteLink = deleteUserConfirmModal.querySelector('#confirmDeleteUserSubmit'); // Get the confirm button inside the modal
        
        // Set the href of the confirmation button to the URL
        confirmDeleteLink.setAttribute('href', url);
    });
</script>
