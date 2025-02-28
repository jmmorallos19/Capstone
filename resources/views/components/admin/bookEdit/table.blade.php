<div class="book-copy-table-container overflow-hidden"
    style="height: 19.5rem; min-height: 19.5rem; max-height: 19.5rem;">
    <div class="book-copy-container-header pt-4 pb-3 ps-3">
        <h5 class="m-0">Related Copies</h5>
    </div>

    <div class="ps-1" id="bookCopyTableContainer" style="height: 20rem; max-height: max-content; overflow-y: auto;">
        <table class="table table-striped" style="width: 100%; table-layout: fixed; border-collapse: collapse;">
            <thead style="position: sticky; top: 0; background-color: white;">
                <tr>
                    <th class="fw-normal" style="font-size: .9rem" scope="col">Accession no.</th>
                    <th class="fw-normal" style="font-size: .9rem" scope="col">Copy No.</th>
                    <th class="fw-normal" style="font-size: .9rem" scope="col">Title</th>
                    <th class="fw-normal" style="font-size: .9rem" scope="col">Status</th>
                    <th class="fw-normal" style="font-size: .9rem" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookCopies as $bookCopy)
                    <tr>
                        <td class="text-capitalize" style="font-size: .9rem">{{ $bookCopy->accession_no }}</td>
                        <td style="font-size: .9rem">{{ $bookCopy->copy_no }}</td>
                        <td class="text-capitalize" style="font-size: .9rem">{{ $bookCopy->title }}</td>
                        @if ($bookCopy->status === "available")
                            <td class="text-capitalize" style="color: green; font-size: .9rem;">{{ $bookCopy->status}}</td>
                        @endif
                        @if ($bookCopy->status === "borrowed")
                            <td class="text-capitalize" style="color: red; font-size: .9rem;">{{ $bookCopy->status}}</td>
                        @endif
                        <td>
                            <div class="action-buttons d-flex gap-1 flex-wrap">
                                <a href="{{ route('admin.bookCopy', ['book' => $book->id, 'bookCopy' => $bookCopy->id]) }}" id="viewbtn" class="btn btn-sm" style="background-color: #193c71; color: #fff; ">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Delete Book Copy --}}
                                <a href="#" class="btn btn-danger btn-sm" id="bookCopyDeleteBtn" type="button"
                                    data-bs-toggle="modal" data-bs-target="#deleteBookCopyConfirmationModal"
                                    data-url="{{ route('delete.book.copy', ['book' => $book->id, 'bookCopy' => $bookCopy->id]) }}">
                                        <i class="bi bi-trash3"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="deleteBookCopyConfirmationModal" tabindex="-1" aria-labelledby="deleteBookCopyConfirmationModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="deleteBookCopyConfirmationModal">Delete Book Copy</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this book copy?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="deleteBookCopyCancelConfirmationtionBtn" data-bs-dismiss="modal">Cancel</button>
                <a id="deleteBookCopyConfirmSubmit" href="#" class="btn btn-primary" style="background-color: #193c71; color: #fff;">Yes</a>
            </div>
        </div>
    </div>
</div>



<script>
    // When the modal is about to be shown
    var deleteBookCopyConfirmModal = document.getElementById('deleteBookCopyConfirmationModal');
    deleteBookCopyConfirmModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // The button that triggered the modal
        var url = button.getAttribute('data-url'); // Get the URL from the data-url attribute
        var confirmDeleteLink = deleteBookCopyConfirmModal.querySelector('#deleteBookCopyConfirmSubmit'); // Get the confirm button inside the modal
        
        // Set the href of the confirmation button to the URL
        confirmDeleteLink.setAttribute('href', url);
    });
</script>
