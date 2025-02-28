<!-- Modal (Popup Form) -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- Changed to modal-lg for a larger modal -->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title fw-bold" id="addBookModalLabel">Add New Book</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body pt-2">
                <!-- Form to Add Book -->
                <form action="{{ route('addBook') }}" method="post" id="bookForm">
                    @csrf

                    <input type="hidden" name="book_form" value="1"> <!-- Hidden field to identify the book form -->

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
                                <input type="text" class="form-control" id="bookTitle" name="bookTitle" value="{{ old('bookTitle') }}">
                                @error('bookTitle')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="authorName" class="form-label">Author*</label>
                                <input type="text" class="form-control" id="authorName" name="authorName" value="{{ old('authorName') }}">
                                @error('authorName')
                                    <div class="text-danger pt-1" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ISBN" class="form-label">ISBN*</label>
                                <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ old('ISBN') }}" maxlength="10">
                                @error('ISBN')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ISBN13" class="form-label">ISBN 13*</label>
                                <input type="text" class="form-control" id="ISBN13" name="ISBN13" value="{{ old('ISBN13') }}" maxlength="13">
                                @error('ISBN13')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Column 2: Remaining inputs from Item Info -->
                        <div class="col-md-3" style="padding-top: 1.8rem;">
                            <!-- Adjusted to col-md-3 for wider columns -->
                            <div class="mb-3">
                                <label for="call_number" class="form-label">Shelf location*</label>
                                <input type="text" class="form-control" id="call_number" name="call_number" value="{{ old('call_number') }}">
                                @error('call_number')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="edition" class="form-label">Edition*</label>
                                <input type="text" class="form-control" id="edition" name="edition" value="{{ old('edition') }}">
                                @error('edition')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="publisher" class="form-label">Publisher*</label>
                                <input type="text" class="form-control" id="publisher" name="publisher" value="{{ old('publisher') }}">
                                @error('publisher')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Year*</label>
                                <input type="text" class="form-control" id="year" name="year" pattern="\d{4}"
                                    title="Please enter a valid year (e.g., 2024)." maxlength="4" value="{{ old('year') }}">
                                @error('year')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="volume" class="form-label">Volume*</label>
                                <input type="text" class="form-control" id="volume" name="volume" value="{{ old('volume') }}">
                                @error('volume')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Column 3: First half of Details -->
                        <div class="col-md-3"> <!-- Adjusted to col-md-4 for wider columns -->
                            <h5 class="fw-bold">Details</h5>

                            <div class="mb-3">
                                <label for="pages" class="form-label">Pages/Duration*</label>
                                <input type="text" class="form-control" id="pages" name="pages" pattern="\d+"
                                    title="Please enter a valid number of pages or duration. Only numbers allowed." value="{{ old('pages') }}">
                                @error('pages')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject*</label>
                                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}">
                                @error('subject')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="biblio" class="form-label">Bibliography*</label>
                                <input type="text" class="form-control" id="biblio" name="biblio" value="{{ old('biblio') }}">
                                @error('biblio')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description*</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="abstract" class="form-label">Abstract*</label>
                                <textarea class="form-control" id="abstract" name="abstract">{{ old('abstract') }}</textarea>
                                @error('abstract')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Column 4: Second half of Details -->
                        <div class="col-md-3" style="padding-top: 1.8rem;">
                            <!-- Adjusted to col-md-4 for wider columns -->
                            
                            <div class="mb-3">
                                <label for="library_branch" class="form-label">Library Branch*</label>
                                <input type="text" class="form-control" id="library_branch" name="library_branch"
                                    value="ICC" readonly>
                                @error('library_branch')
                                    <div class="text-danger" style="font-size: .9rem">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Form Footer (with Submit Button) -->
                    <div class="modal-footer pe-0 ps-0 pb-0">
                        <button type="button" style="background-color:#193c71; color: #fff;" class="btn btn-success"
                            name="book_form" id="addBookModalBtn">Add Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Confirmation Modal -->
<div class="modal fade" id="bookConfirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Add Book</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to add this book?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelConfirmationBtn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmSubmit" style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Wait for DOM content to load
    document.addEventListener('DOMContentLoaded', function () {
        // Check if there are any validation errors in the Book form
        // var hasBookErrors = @json($errors->any()); // Check if there are any errors at all in the form
        // var bookErrors = @json($errors->all()); // Collect all error messages for debugging

        // // Show Book Modal if there are any errors in the book-related fields
    
            if (@json($errors->has('accessionNo')) || @json($errors->has('bookTitle')) || @json($errors->has('authorName')) || @json($errors->has('ISBN')) || @json($errors->has('ISBN13')) ||
                @json($errors->has('call_number')) || @json($errors->has('edition')) || @json($errors->has('publisher')) ||
                @json($errors->has('year')) || @json($errors->has('volume')) || @json($errors->has('pages')) ||
                @json($errors->has('subject')) || @json($errors->has('biblio')) || @json($errors->has('description')) ||
                @json($errors->has('abstract')) || @json($errors->has('library_branch'))) {
                $('#addBookModal').modal('show');
            }
        

        // Book Form - Show confirmation modal when "Add Book" button is clicked
        document.getElementById('addBookModalBtn')?.addEventListener('click', function() {
            $('#addBookModal').modal('hide');  // Hide the "Add Book" modal
            $('#bookConfirmModal').modal('show');  // Show the confirmation modal
        });

        // Submit Book Form when confirmation modal confirms the action
        document.getElementById('confirmSubmit')?.addEventListener('click', function() {
            document.getElementById('bookForm').submit();
        });

        // Cancel Book Form submission, re-show the "Add Book" modal
        document.getElementById('cancelConfirmationBtn')?.addEventListener('click', function() {
            $('#addBookModal').modal('show');  // Show the "Add Book" modal
            $('#bookConfirmModal').modal('hide');  // Hide the confirmation modal
        });

        // Add Book - Ensure the "Add Book" modal reappears if the confirmation modal is closed
        $('#bookConfirmModal').on('hidden.bs.modal', function () {
            $('#addBookModal').modal('show');
        });
    });
</script>
