<!-- Modal Structure for Return -->
<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="returnModalLabel">Book Return</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="returnForm" action="{{ route('returnBook') }}" method="post">  
                    @csrf

                    <!-- Step 1 -->
                    <div id="returnStep1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="returnAccession" class="form-label">Accession No.*</label>
                                    <input type="text" class="form-control" id="returnAccession" name="returnAccession" autofocus required>
                                </div>
        
                                <input type="text" id="returnBookid" name="returnBookid" hidden>
        
                                <div class="mb-3">
                                    <label for="titleValueReturn" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="titleValueReturn" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="copiesValueReturn" class="form-label">Copies</label>
                                    <input type="text" class="form-control" name="category" id="copiesValueReturn" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="authorValueReturn" class="form-label">Author</label>
                                    <input type="text" class="form-control" name="author" id="authorValueReturn" readonly>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="isbnValueReturn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" name="isbn" id="isbnValueReturn" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="isbn13ValueReturn" class="form-label">ISBN 13</label>
                                    <input type="text" class="form-control" name="isbn13" id="isbn13ValueReturn" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="call_numberValueReturn" class="form-label">Call Number</label>
                                    <input type="text" class="form-control" name="call_number" id="call_numberValueReturn" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="pagesValueReturn" class="form-label">Pages/Duration</label>
                                    <input type="text" class="form-control" name="pages" id="pagesValueReturn" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 (Initially hidden) -->
                    <div id="returnStep2" class="d-none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="returnLibraryCard" class="form-label">Library Card No.*</label>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <div class="w-100">
                                            <input type="text" class="form-control" id="returnLibraryCard" name="returnLibraryCard">
                                        </div>
                                    </div>
                                </div>
        
                                <input type="text" id="returnMemberId" name="returnMemberId" hidden>
        
                                <div class="mb-3">
                                    <label for="nameReturn" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="nameReturn" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="emailReturn" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="emailReturn" id="emailReturn" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="memberGroupReturn" class="form-label">Member Group</label>
                                    <input type="text" class="form-control" name="memberGroupReturn" id="memberGroupReturn" readonly>
                                </div>
        
                                <div class="mb-3 d-none">
                                    <label for="courseReturn" class="form-label">Year & Course / Department</label>
                                    <input type="text" class="form-control" name="course" id="courseReturn" readonly>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="studentNoReturn" class="form-label">Student No. / Employee No.</label>
                                    <input type="text" class="form-control" name="studentNo" id="studentNoReturn" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="phoneaddressReturn" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phoneaddress" id="phoneaddressReturn" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="addressReturn" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" id="addressReturn" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="bookCondition" class="form-label">Book Conditon</label>
                                    <select class="form-select" name="bookCondition" id="bookCondition"
                                        aria-label="Book Status">
                                        <option value="Good" selected>Good</option>
                                        <option value="Damaged">Damaged</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- Previous Button (for Step 2) -->
                        <button type="button" class="btn btn-secondary" id="prevReturnBtn"
                            style="display: none;">Previous</button>
                        <!-- Submit Button -->
                        <button type="button" class="btn" id="submitReturnBtn"
                            style="display: none; background-color: #193c71; color: #fff;">Submit</button>
                        <!-- Next Button (for Step 1) -->
                        <button type="button" class="btn" id="nextReturnBtn"
                            style="background-color: #193c71; color: #fff;">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="bookReturnConfirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Book Return</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to return this book?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="bookReturnCancelConfirmationBtn"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="bookReturnConfirmSubmit"
                    style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle navigation between steps
        document.getElementById('nextReturnBtn').addEventListener('click', function () {
            // Show step 2 and hide step 1
            document.getElementById('returnStep1').classList.add('d-none');
            document.getElementById('returnStep2').classList.remove('d-none');
            // Hide next button
            document.getElementById('nextReturnBtn').style.display = 'none';
            // Show previous and submit buttons
            document.getElementById('prevReturnBtn').style.display = 'inline-block';
            document.getElementById('submitReturnBtn').style.display = 'inline-block';
        });

        // Handle going back to step 1
        document.getElementById('prevReturnBtn').addEventListener('click', function () {
            // Show step 1 and hide step 2
            document.getElementById('returnStep1').classList.remove('d-none');
            document.getElementById('returnStep2').classList.add('d-none');
            // Hide previous button
            document.getElementById('prevReturnBtn').style.display = 'none';
            // Show next button
            document.getElementById('nextReturnBtn').style.display = 'inline-block';
            // Hide submit button
            document.getElementById('submitReturnBtn').style.display = 'none';
        });

         // Book Form - Show confirmation modal when "Add Book" button is clicked
         document.getElementById('submitReturnBtn')?.addEventListener('click', function () {
            $('#returnModal').modal('hide');  // Hide the "Add Book" modal
            $('#bookReturnConfirmModal').modal('show');  // Show the confirmation modal
        });

        // Submit Book Form when confirmation modal confirms the action
        document.getElementById('bookReturnConfirmSubmit')?.addEventListener('click', function () {
            document.getElementById('returnForm').submit();
        });

        // Cancel Book Form submission, re-show the "Add Book" modal
        document.getElementById('bookReturnCancelConfirmationBtn')?.addEventListener('click', function () {
            $('#returnModal').modal('show');  // Show the "Add Book" modal
            $('#bookReturnConfirmModal').modal('hide');  // Hide the confirmation modal
        });

        // Add Book - Ensure the "Add Book" modal reappears if the confirmation modal is closed
        $('#bookReturnConfirmModal').on('hidden.bs.modal', function () {
            $('#returnModal').modal('show');
        });

        // For disabled next button
        // Get the elements
        const accessionField = document.getElementById('returnAccession');
        const nextBorrowBtn = document.getElementById('nextReturnBtn');
        const submitBorrowBtn = document.getElementById('submitReturnBtn');

        // Disable buttons initially
        nextBorrowBtn.disabled = true;  // Disable Next button
        submitBorrowBtn.disabled = true;  // Disable Submit button initially

        // Function to check if Accession field is filled
        function checkAccessionValue() {
            if (accessionField.value.trim() !== '') {
                nextBorrowBtn.disabled = false;  // Enable Next button
            } else {
                nextBorrowBtn.disabled = true;  // Disable Next button
            }
        }

        // Add event listener to the Accession No field to check on input
        accessionField.addEventListener('input', checkAccessionValue);

        // You can also add similar logic to enable/disable the Submit button when Step 2 is completed
        // Assuming Step 2 involves a library card or some other required field

        const libraryCardField = document.getElementById('returnLibraryCard');

        function checkLibraryCard() {
            if (libraryCardField.value.trim() !== '') {
                submitBorrowBtn.disabled = false;  // Enable Submit button
            } else {
                submitBorrowBtn.disabled = true;  // Disable Submit button
            }
        }

        // Add event listener to the library card field to check on input
        libraryCardField.addEventListener('input', checkLibraryCard);
    });


    // Ajax for Return Data
    $(document).on('input', '#returnAccession, #returnLibraryCard', function () {
    var accession = $('#returnAccession').val();  // Get the value of the #accession input field
    var libraryCard = $('#returnLibraryCard').val();  // Get the value of the #libraryCard input field

    $.ajax({
        type: 'POST',
        url: "{{ route('get.data.return') }}",  // Make sure this route is correct
        data: {
            accession: accession,  // Send the accession value
            libraryCard: libraryCard,  // Send the library card value
            _token: '{{ csrf_token() }}'  // CSRF Token for security
        },
        dataType: "JSON",
        success: function (data) {
            // Reset fields first to avoid showing old data
            $('#titleValueReturn').val('');
            $('#returnBookid').val('');
            $('#authorValueReturn').val('');
            $('#copiesValueReturn').val('');
            $('#isbnValueReturn').val('');
            $('#isbn13ValueReturn').val('');
            $('#call_numberValueReturn').val('');
            $('#pagesValueReturn').val('');
            $('#nameReturn').val('');
            $('#returnMemberId').val('');
            $('#memberGroupReturn').val('');
            $('#courseReturn').val('');
            $('#studentNoReturn').val('');
            $('#emailReturn').val('');
            $('#phoneaddressReturn').val('');
            $('#addressReturn').val('');

            if (data.status === 'success') {
                // If data.accession is available, display book data
                if (data.accession) {
                    $('#titleValueReturn').val(data.accession.title);
                    $('#returnBookid').val(data.accession.id);
                    $('#authorValueReturn').val(data.accession.author);
                    $('#copiesValueReturn').val(data.accession.total_copies);
                    $('#isbnValueReturn').val(data.accession.isbn);
                    $('#isbn13ValueReturn').val(data.accession.isbn13);
                    $('#call_numberValueReturn').val(data.accession.call_no);
                    $('#pagesValueReturn').val(data.accession.pages);

                    console.log(data.accession.category);
                }

                // If data.libraryCard is available, display member data
                if (data.libraryCard) {
                    $('#nameReturn').val(data.libraryCard.name);
                    $('#returnMemberId').val(data.libraryCard.id);
                    $('#memberGroupReturn').val(data.libraryCard.member_group);
                    $('#courseReturn').val(data.libraryCard.year_and_course);
                    $('#studentNoReturn').val(data.libraryCard.student_no);
                    $('#emailReturn').val(data.libraryCard.email);
                    $('#phoneaddressReturn').val(data.libraryCard.phone);
                    $('#addressReturn').val(data.libraryCard.address);

                    console.log(data.libraryCard.id);
                }
            }
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);  // Log any errors
        }
    });
});

</script>