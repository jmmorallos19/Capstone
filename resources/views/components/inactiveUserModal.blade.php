<form action="{{ route('inactiveUser', $stafflist->id) }}" id="inactiveUserForm" method="post">
    @csrf
    @method('PUT')

    <button class="btn btn-danger btn-sm" id="inactiveBtn"
    style="background-color: rgb(247, 121, 4); border: 1px solid rgb(247, 121, 4); font-size: .9rem; outline: none;"
    type="button">
    <i class="bi bi-person-fill-slash"></i>
    </button>
</form>


<!-- Confirmation Modal -->
<div class="modal fade" id="inactiveUserConfirmModal" tabindex="-1" aria-labelledby="confirmInactiveUserinactiveUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmInactiveUserModalLabel">Deactivate Staff Account Confirmation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to deactivate this staff account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelInactiveUserConfirmationBtn"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmInactiveUserSubmit"
                    style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Select all elements within #inactiveUserForm
        const inactiveUserFormElements = document.querySelectorAll('#inactiveUserForm');

        // Loop through each element in #inactiveUserForm and add an event listener
        inactiveUserFormElements.forEach(function (element) {
            element.addEventListener('click', function () {
                // Show the confirmation modal when any part of the form is clicked
                $('#inactiveUserConfirmModal').modal('show');
            });
        });

        // Submit Book Form when confirmation modal confirms the action
        document.getElementById('confirmInactiveUserSubmit')?.addEventListener('click', function() {
            document.getElementById('inactiveUserForm').submit();
        });
    });

</script>