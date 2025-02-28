<form action="{{ route('activeUser', $stafflist->id) }}" id="activeUserForm" method="post">
    @csrf
    @method('PUT')

    <button class="btn btn-danger btn-sm" id="activeBtn"
    style="background-color: green; border: 1px solid green; font-size: .9rem; outline: none;"
    type="button">
    <i class="bi bi-person-fill-check"></i>
    </button>
</form>


<!-- Confirmation Modal -->
<div class="modal fade" id="ActiveUserConfirmModal" tabindex="-1" aria-labelledby="confirmActivectiveUserinactiveUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmActivectiveUserModalLabel">Activate Staff Account Confirmation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to Activate this staff account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelActiveUserConfirmationBtn"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmActiveUserSubmit"
                    style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Select all elements within #activeUserForm
        const activeUserFormElements = document.querySelectorAll('#activeUserForm');

        // Loop through each element in #activeUserForm and add an event listener
        activeUserFormElements.forEach(function (element) {
            element.addEventListener('click', function () {
                // Show the confirmation modal when any part of the form is clicked
                $('#ActiveUserConfirmModal').modal('show');
            });
        });

        // Submit Book Form when confirmation modal confirms the action
        document.getElementById('confirmActiveUserSubmit')?.addEventListener('click', function() {
            document.getElementById('activeUserForm').submit();
        });
    });

</script>