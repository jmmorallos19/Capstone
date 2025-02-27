<div class="modal fade" id="editBookCopyModal" tabindex="-1" aria-labelledby="editBookCopyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- Changed to modal-lg for a larger modal -->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title fw-bold" id="editBookCopyModalLabel">Edit Book Copy Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body pt-2">
                <!-- Form to Add Book -->
                <form action="{{ route('updateBookCopy',  $bookCopy->id) }}" method="post" id="editBookCopyForm">
                    @csrf

                    <div class="row">
                        <!-- Column 1: First five inputs from Item Info -->
                        <div class="col-md-3"> <!-- Adjusted to col-md-3 for wider columns -->
                            <h5 class="fw-bold">Item Info</h5>
                            
                            <div class="mb-3">
                                <label for="bookTitle" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="bookTitle" name="bookTitleCopyEdit" value="{{ $bookCopy->title }}">
                                @error('bookTitleEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="authorName" class="form-label">Author*</label>
                                <input type="text" class="form-control" id="authorName" name="authorNameCopyEdit" value="{{ $bookCopy->author }}">
                                @error('authorNameCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ISBN" class="form-label">ISBN*</label>
                                <input type="text" class="form-control" id="ISBN" name="ISBNCopyEdit" value="{{ $bookCopy->isbn }}">
                                @error('ISBNCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ISBN13" class="form-label">ISBN 13*</label>
                                <input type="text" class="form-control" id="ISBN13" name="ISBN13CopyEdit" value="{{ $bookCopy->isbn13 }}">
                                @error('ISBN13CopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="call_number" class="form-label">Shelf location*</label>
                                <input type="text" class="form-control" id="call_number" name="call_numberCopyEdit" value="{{ $bookCopy->call_no }}">
                                @error('call_numberCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Column 2: Remaining inputs from Item Info -->
                        <div class="col-md-3" style="padding-top: 1.8rem;">
                            <!-- Adjusted to col-md-3 for wider columns -->

                            <div class="mb-3">
                                <label for="edition" class="form-label">Edition*</label>
                                <input type="text" class="form-control" id="edition" name="editionCopyEdit" value="{{ $bookCopy->edition }}">
                                @error('editionCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="publisher" class="form-label">Publisher*</label>
                                <input type="text" class="form-control" id="publisher" name="publisherCopyEdit" value="{{ $bookCopy->publisher }}">
                                @error('publisherCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Year*</label>
                                <input type="text" class="form-control" id="year" name="yearCopyEdit" pattern="\d{4}"
                                    title="Please enter a valid year (e.g., 2024)." maxlength="4" value="{{ $bookCopy->publication_year }}">
                                @error('yearCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="volume" class="form-label">Volume*</label>
                                <input type="text" class="form-control" id="volume" name="volumeCopyEdit" value="{{ $bookCopy->volume }}">
                                @error('volumeCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pages" class="form-label">Pages/Duration*</label>
                                <input type="text" class="form-control" id="pages" name="pagesCopyEdit" pattern="\d+"
                                    title="Please enter a valid number of pages or duration. Only numbers allowed." value="{{ $bookCopy->pages }}">
                                @error('pagesCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Column 3: First half of Details -->
                        <div class="col-md-3"> <!-- Adjusted to col-md-4 for wider columns -->
                            <h5 class="fw-bold">Details</h5>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject*</label>
                                <input type="text" class="form-control" id="subject" name="subjectCopyEdit" value="{{ $bookCopy->subject }}">
                                @error('subjectCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="biblio" class="form-label">Bibliography*</label>
                                <input type="text" class="form-control" id="biblio" name="biblioCopyEdit" value="{{ $bookCopy->bibliography }}">
                                @error('biblioCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description*</label>
                                <textarea class="form-control" id="description" name="descriptionCopyEdit">{{ $bookCopy->description }}</textarea>
                                @error('descriptionCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="abstract" class="form-label">Abstract*</label>
                                <textarea class="form-control" id="abstract" name="abstractCopyEdit">{{ $bookCopy->abstract }}</textarea>
                                @error('abstractCopyEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror    
                            </div>
                        </div>

                        <!-- Column 4: Second half of Details -->
                        <div class="col-md-3" style="padding-top: 1.8rem;">
                            <!-- Adjusted to col-md-4 for wider columns -->
                            <div class="mb-3">
                                <label for="library_branch" class="form-label">Library Branch*</label>
                                <input type="text" class="form-control" id="library_branch" name="library_branchCopyEdit"
                                    value="ICC" value="{{ $bookCopy->library_branch }}" readonly>
                            </div>

                        </div>
                    </div>

                    <!-- Form Footer (with Submit Button) -->
                    <div class="modal-footer pe-0 ps-0 pb-0">
                        <button type="button" style="background-color:#193c71; color: #fff;" class="btn btn-success"
                            name="book_form" id="editBookCopyModalBtn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Confirmation Modal -->
<div class="modal fade" id="editBookConfirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Book Changes</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to update this book copy details?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelEditBookCopyConfirmationBtn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmEditBookCopySubmit" style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        if (@json($errors->has('bookTitleCopyEdit')) || @json($errors->has('authorNameCopyEdit')) || @json($errors->has('ISBNCopyEdit')) || @json($errors->has('ISBN13CopyEdit')) ||
            @json($errors->has('call_numberCopyEdit')) || @json($errors->has('editionCopyEdit')) || @json($errors->has('publisherCopyEdit')) ||
            @json($errors->has('yearCopyEdit')) || @json($errors->has('volumeCopyEdit')) || @json($errors->has('pagesCopyEdit')) ||
            @json($errors->has('subjectCopyEdit')) || @json($errors->has('biblioCopyEdit')) || @json($errors->has('descriptionCopyEdit')) ||
            @json($errors->has('abstractCopyEdit')) || @json($errors->has('library_branchCopyEdit'))) {
                $('#editBookCopyModal').modal('show');
        }

        document.getElementById('editBookCopyModalBtn')?.addEventListener('click', function() {
            $('#editBookCopyModal').modal('hide');  // Hide the "Add Book" modal
            $('#editBookConfirmModal').modal('show');  // Show the confirmation modal
        });

        document.getElementById('confirmEditBookCopySubmit')?.addEventListener('click', function() {
            document.getElementById('editBookCopyForm').submit();
        });

        document.getElementById('cancelEditBookCopyConfirmationBtn')?.addEventListener('click', function() {
            $('#editBookCopyModal').modal('show');  // Show the "Add Book" modal
            $('#editBookConfirmModal').modal('hide');  // Hide the confirmation modal
        });

        $('#editBookConfirmModal').on('hidden.bs.modal', function () {
            $('#editBookCopyModal').modal('show');
        });


        // Select all input fields and the "Save Changes" button
        const inputs = document.querySelectorAll('#editBookCopyForm input, #editBookCopyForm select, #editBookCopyForm textarea');
        const saveButton = document.getElementById('editBookCopyModalBtn');
        let initialValues = {}; // Store initial values of the inputs

        // Store the initial values of the inputs
        inputs.forEach(input => {
            initialValues[input.name] = input.value;
        });

        // Function to check if any input value has changed
        function checkChanges() {
            let hasChanges = false;

            inputs.forEach(input => {
                if (input.value !== initialValues[input.name]) {
                    hasChanges = true;
                }
            });

            // Enable/Disable the save button based on whether there are changes
            saveButton.disabled = !hasChanges;
        }

        // Add event listeners to the inputs to track changes
        inputs.forEach(input => {
            input.addEventListener('input', checkChanges);
        });

        // Initial check on page load to ensure the button state is correct
        checkChanges();
    });

</script>