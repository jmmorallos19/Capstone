
<a href="#" class="btn btn-danger" id="archiveBtn" style="font-size: .9rem; padding: .4rem .6rem;" type="button"
   data-bs-toggle="modal" data-bs-target="#bookArchiveConfirmModal"
   data-url="{{ route('archiveBook', $book->id) }}">
    <i class="bi bi-archive"></i>
</a>



<!-- Archive Confirmation Modal -->
<div class="modal fade" id="bookArchiveConfirmModal" tabindex="-1" aria-labelledby="confirmArchiveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmArchiveModalLabel">Confirm Book Archive</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to archive this book?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelArchiveBookConfirmationBtn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmArchiveBookSubmit" style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>



<script>
    // When the modal is about to be shown
    var bookArchiveConfirmModal = document.getElementById('bookArchiveConfirmModal');
    bookArchiveConfirmModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // The button that triggered the modal
        var url = button.getAttribute('data-url'); // Get the URL from the data-url attribute
        var confirmArchiveLink = bookArchiveConfirmModal.querySelector('#confirmArchiveBookSubmit'); // Get the confirm button inside the modal
        
        // Set the href of the confirmation button to the URL
        confirmArchiveLink.setAttribute('onclick', 'window.location.href="' + url + '";');
    });

</script>
