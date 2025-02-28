<!-- Restore Button -->
<a href="#" class="btn btn-success" id="restoreBtn" style="font-size: .9rem; padding: .4rem .6rem;" type="button"
   data-bs-toggle="modal" data-bs-target="#bookRestoreConfirmModal"
   data-url="{{ route('restoreBook', $book->id) }}">
    <i class="bi bi-arrow-clockwise"></i>
</a>

<!-- Restore Confirmation Modal -->
<div class="modal fade" id="bookRestoreConfirmModal" tabindex="-1" aria-labelledby="confirmRestoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmRestoreModalLabel">Confirm Book Restore</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to restore this book?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelRestoreBookConfirmationBtn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmRestoreBookSubmit" style="background-color: #193c71; color: #fff;">Yes, Restore</button>
            </div>
        </div>
    </div>
</div>

<script>
    // When the modal is about to be shown
    var bookRestoreConfirmModal = document.getElementById('bookRestoreConfirmModal');
    bookRestoreConfirmModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // The button that triggered the modal
        var url = button.getAttribute('data-url'); // Get the URL from the data-url attribute
        var confirmRestoreLink = bookRestoreConfirmModal.querySelector('#confirmRestoreBookSubmit'); // Get the confirm button inside the modal
        
        // Set the href of the confirmation button to the URL
        confirmRestoreLink.setAttribute('onclick', 'window.location.href="' + url + '";');
    });
</script>
