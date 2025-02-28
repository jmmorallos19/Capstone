<!-- Modal (Popup Form) -->
<div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- Changed to modal-lg for a larger modal -->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title fw-bold" id="editBookModalLabel">Edit Book Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body pt-2">
                <!-- Form to Add Book -->
                <form action="{{ route('updateBook', ['book' => $book->id]) }}" method="post" id="editBookForm">
                    @csrf

                    <div class="row">
                        <!-- Column 1: First five inputs from Item Info -->
                        <div class="col-md-3"> <!-- Adjusted to col-md-3 for wider columns -->
                            <h5 class="fw-bold">Item Info</h5>
                            
                            <div class="mb-3">
                                <label for="bookTitle" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="bookTitle" name="bookTitleEdit" value="{{ $book->title }}">
                                @error('bookTitleEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="authorName" class="form-label">Author*</label>
                                <input type="text" class="form-control" id="authorName" name="authorNameEdit" value="{{ $book->author }}">
                                @error('authorNameEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ISBN" class="form-label">ISBN*</label>
                                <input type="text" class="form-control" id="ISBN" name="ISBNEdit" value="{{ $book->isbn }}">
                                @error('ISBNEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ISBN13" class="form-label">ISBN 13*</label>
                                <input type="text" class="form-control" id="ISBN13" name="ISBN13Edit" value="{{ $book->isbn13 }}">
                                @error('ISBN13Edit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="call_number" class="form-label">Shelf location*</label>
                                <input type="text" class="form-control" id="call_number" name="call_numberEdit" value="{{ $book->call_no }}">
                                @error('call_numberEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Column 2: Remaining inputs from Item Info -->
                        <div class="col-md-3" style="padding-top: 1.8rem;">
                            <!-- Adjusted to col-md-3 for wider columns -->

                            <div class="mb-3">
                                <label for="edition" class="form-label">Edition*</label>
                                <input type="text" class="form-control" id="edition" name="editionEdit" value="{{ $book->edition }}">
                                @error('editionEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="publisher" class="form-label">Publisher*</label>
                                <input type="text" class="form-control" id="publisher" name="publisherEdit" value="{{ $book->publisher }}">
                                @error('publisherEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Year*</label>
                                <input type="text" class="form-control" id="year" name="yearEdit" pattern="\d{4}"
                                    title="Please enter a valid year (e.g., 2024)." maxlength="4" value="{{ $book->publication_year }}">
                                @error('yearEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="volume" class="form-label">Volume*</label>
                                <input type="text" class="form-control" id="volume" name="volumeEdit" value="{{ $book->volume }}">
                                @error('volumeEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pages" class="form-label">Pages/Duration*</label>
                                <input type="text" class="form-control" id="pages" name="pagesEdit" pattern="\d+"
                                    title="Please enter a valid number of pages or duration. Only numbers allowed." value="{{ $book->pages }}">
                                @error('pagesEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Column 3: First half of Details -->
                        <div class="col-md-3"> <!-- Adjusted to col-md-4 for wider columns -->
                            <h5 class="fw-bold">Details</h5>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject*</label>
                                <input type="text" class="form-control" id="subject" name="subjectEdit" value="{{ $book->subject }}">
                                @error('subjectEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="biblio" class="form-label">Bibliography*</label>
                                <input type="text" class="form-control" id="biblio" name="biblioEdit" value="{{ $book->bibliography }}">
                                @error('biblioEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description*</label>
                                <textarea class="form-control" id="description" name="descriptionEdit">{{ $book->description }}</textarea>
                                @error('descriptionEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="abstract" class="form-label">Abstract*</label>
                                <textarea class="form-control" id="abstract" name="abstractEdit">{{ $book->abstract }}</textarea>
                                @error('abstractEdit')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror    
                            </div>
                        </div>

                        <!-- Column 4: Second half of Details -->
                        <div class="col-md-3" style="padding-top: 1.8rem;">
                            <!-- Adjusted to col-md-4 for wider columns -->


                            <div class="mb-3">
                                <label for="library_branch" class="form-label">Library Branch*</label>
                                <input type="text" class="form-control" id="library_branch" name="library_branchEdit"
                                    value="ICC" value="{{ $book->library_branch }}" readonly>
                            </div>

                        </div>
                    </div>

                    <!-- Form Footer (with Submit Button) -->
                    <div class="modal-footer pe-0 ps-0 pb-0">
                        <button type="button" style="background-color:#193c71; color: #fff;" class="btn btn-success"
                            name="book_form" id="editBookModalBtn">Save Changes</button>
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
                Are you sure you want to update this book's details?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelEditBookConfirmationBtn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmEditBookSubmit" style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function (){

        if (@json($errors->has('bookTitleEdit')) || @json($errors->has('authorNameEdit')) ||
                @json($errors->has('categoryEdit')) || @json($errors->has('ISBNEdit')) || @json($errors->has('ISBN13Edit')) ||
                @json($errors->has('call_numberEdit')) || @json($errors->has('editionEdit')) || @json($errors->has('publisherEdit')) ||
                @json($errors->has('yearEdit')) || @json($errors->has('volumeEdit')) || @json($errors->has('pagesEdit')) ||
                @json($errors->has('subjectEdit')) || @json($errors->has('biblioEdit')) || @json($errors->has('descriptionEdit')) ||
                @json($errors->has('abstractEdit')) || @json($errors->has('library_branchEdit'))) {
                $('#editBookModal').modal('show');
            }
        

        document.getElementById('editBookModalBtn')?.addEventListener('click', function() {
            $('#editBookModal').modal('hide');  // Hide the "Add Book" modal
            $('#editBookConfirmModal').modal('show');  // Show the confirmation modal
        });

        document.getElementById('confirmEditBookSubmit')?.addEventListener('click', function() {
            document.getElementById('editBookForm').submit();
        });

        document.getElementById('cancelEditBookConfirmationBtn')?.addEventListener('click', function() {
            $('#editBookModal').modal('show');  // Show the "Add Book" modal
            $('#editBookConfirmModala').modal('hide');  // Hide the confirmation modal
        });

        $('#editBookConfirmModal').on('hidden.bs.modal', function () {
            $('#editBookModal').modal('show');
        });


        // Select all input fields and the "Save Changes" button
        const inputs = document.querySelectorAll('#editBookForm input, #editBookForm select, #editBookForm textarea');
        const saveButton = document.getElementById('editBookModalBtn');
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