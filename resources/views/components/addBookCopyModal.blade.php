<!-- Modal (Popup Form) -->
<div class="modal fade" id="addBookCopyModal" tabindex="-1" aria-labelledby="addBookCopyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- Changed to modal-lg for a larger modal -->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title fw-bold" id="addBookCopyModalLabel">Add Book Copy</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body pt-2">
                <!-- Form to Add Book -->
                <form action="{{ route('addBookCopy', ['book' => $book->id]) }}" method="post" id="bookCopyForm">
                    @csrf

                    <div class="row">
                        <!-- Column 1: First five inputs from Item Info -->
                        <div class="col-md-3"> <!-- Adjusted to col-md-3 for wider columns -->
                            <h5 class="fw-bold">Item Info</h5>

                            <!-- Member No. Field -->
                            <div class="mb-3">
                                <label for="bookID" class="form-label">Accession No.*</label>
                                <input type="text" class="form-control" id="bookID" name="accessionNo" readonly
                                    value="{{ $nextBookAccession ?? '0000' }}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="bookTitle" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="bookTitle" name="bookTitleCopy" value="{{ $book->title }}">
                            </div>

                            <div class="mb-3">
                                <label for="authorName" class="form-label">Author*</label>
                                <input type="text" class="form-control" id="authorName" name="authorNameCopy" value="{{ $book->author }}">
                            </div>

                            <div class="mb-3">
                                <label for="ISBN" class="form-label">ISBN*</label>
                                <input type="text" class="form-control" id="ISBN" name="ISBNCopy" value="{{ $book->isbn }}">
                            </div>

                            <div class="mb-3">
                                <label for="ISBN13" class="form-label">ISBN 13*</label>
                                <input type="text" class="form-control" id="ISBN13" name="ISBN13Copy" value="{{ $book->isbn13 }}">
                            </div>


                        </div>

                        <!-- Column 2: Remaining inputs from Item Info -->
                        <div class="col-md-3" style="padding-top: 1.8rem;">
                            <!-- Adjusted to col-md-3 for wider columns -->
                            <div class="mb-3">
                                <label for="call_number" class="form-label">Shelf location*</label>
                                <input type="text" class="form-control" id="call_number" name="call_numberCopy" value="{{ $book->call_no }}">
                            </div>

                            <div class="mb-3">
                                <label for="edition" class="form-label">Edition*</label>
                                <input type="text" class="form-control" id="edition" name="editionCopy" value="{{ $book->edition }}">
                            </div>

                            <div class="mb-3">
                                <label for="publisher" class="form-label">Publisher*</label>
                                <input type="text" class="form-control" id="publisher" name="publisherCopy" value="{{ $book->publisher }}">
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Year*</label>
                                <input type="text" class="form-control" id="year" name="yearCopy" pattern="\d{4}"
                                    title="Please enter a valid year (e.g., 2024)." maxlength="4" value="{{ $book->publication_year }}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="volume" class="form-label">Volume*</label>
                                <input type="text" class="form-control" id="volume" name="volumeCopy" value="{{ $book->volume }}">
                            </div>

                        </div>

                        <!-- Column 3: First half of Details -->
                        <div class="col-md-3"> <!-- Adjusted to col-md-4 for wider columns -->
                            <h5 class="fw-bold">Details</h5>

                            <div class="mb-3">
                                <label for="pages" class="form-label">Pages/Duration*</label>
                                <input type="text" class="form-control" id="pages" name="pagesCopy" pattern="\d+"
                                    title="Please enter a valid number of pages or duration. Only numbers allowed." value="{{ $book->pages }}">
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject*</label>
                                <input type="text" class="form-control" id="subject" name="subjectCopy" value="{{ $book->subject }}">
                            </div>

                            <div class="mb-3">
                                <label for="biblio" class="form-label">Bibliography*</label>
                                <input type="text" class="form-control" id="biblio" name="biblioCopy" value="{{ $book->bibliography }}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description*</label>
                                <textarea class="form-control" id="description" name="descriptionCopy">{{ $book->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="abstract" class="form-label">Abstract*</label>
                                <textarea class="form-control" id="abstract" name="abstractCopy">{{ $book->abstract }}</textarea>
                            </div>
                        </div>

                        <!-- Column 4: Second half of Details -->
                        <div class="col-md-3" style="padding-top: 1.8rem;">
                            <!-- Adjusted to col-md-4 for wider columns -->
                            <div class="mb-3">
                                <label for="library_branch" class="form-label">Library Branch*</label>
                                <input type="text" class="form-control" id="library_branch" name="library_branchCopy"
                                    value="ICC" value="{{ $book->library_branch }}" readonly>
                            </div>

                        </div>
                    </div>

                    <!-- Form Footer (with Submit Button) -->
                    <div class="modal-footer pe-0 ps-0 pb-0">
                        <button type="button" style="background-color:#193c71; color: #fff;" class="btn btn-success"
                            name="book_form" id="addBookCopyModalBtn">Add Book Copy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Confirmation Modal -->
<div class="modal fade" id="bookCopyConfirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Add Book Copy</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to add this book copy?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelBookCopyConfirmationBtn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmBookCopySubmit" style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function(){
        
        // Book Form - Show confirmation modal when "Add Book" button is clicked
        document.getElementById('addBookCopyModalBtn')?.addEventListener('click', function() {
            $('#addBookCopyModal').modal('hide');  // Hide the "Add Book" modal
            $('#bookCopyConfirmModal').modal('show');  // Show the confirmation modal
        });

        // Submit Book Form when confirmation modal confirms the action
        document.getElementById('confirmBookCopySubmit')?.addEventListener('click', function() {
            document.getElementById('bookCopyForm').submit();
        });

        // Cancel Book Form submission, re-show the "Add Book" modal
        document.getElementById('cancelBookCopyConfirmationBtn')?.addEventListener('click', function() {
            $('#addBookCopyModal').modal('show');  // Show the "Add Book" modal
            $('#bookCopyConfirmModal').modal('hide');  // Hide the confirmation modal
        });

        // Add Book - Ensure the "Add Book" modal reappears if the confirmation modal is closed
        $('#bookCopyConfirmModal').on('hidden.bs.modal', function () {
            $('#addBookCopyModal').modal('show');
        });

    });


</script>