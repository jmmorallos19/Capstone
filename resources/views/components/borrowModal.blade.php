<!-- Modal Structure -->
<div class="modal fade" id="borrowModal" tabindex="-1" aria-labelledby="borrowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="borrowModalLabel">Lend Book</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="borrowForm" action="{{ route('borrowBook') }}" method="post">
                    @csrf

                    <!-- Step 1 -->
                    <div id="borrowStep1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="accession" class="form-label">Accession No.*</label>
                                    <input type="text" class="form-control" id="accession" name="accession" autofocus>
                                </div>
        
                                <input type="text" id="bookid" name="bookid" hidden>
        
                                <div class="mb-3">
                                    <label for="titleValue" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="titleValue" id="titleValue" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="copiesValue" class="form-label">Copies</label>
                                    <input type="text" class="form-control" name="copiesValue" id="copiesValue"
                                        readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="authorValue" class="form-label">Author</label>
                                    <input type="text" class="form-control" name="authorValue" id="authorValue" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="isbnValue" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" name="isbnValue" id="isbnValue" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="isbn13Value" class="form-label">ISBN 13</label>
                                    <input type="text" class="form-control" name="isbn13Value" id="isbn13Value" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="call_numberValue" class="form-label">Call Number</label>
                                    <input type="text" class="form-control" name="call_numberValue" id="call_numberValue"
                                        readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="pagesValue" class="form-label">Pages/Duration</label>
                                    <input type="text" class="form-control" name="pagesValue" id="pagesValue" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 (Initially hidden) -->
                    <div id="borrowStep2" class="d-none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="libraryCard" class="form-label">Library Card No.*</label>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <div class="w-100">
                                            <input type="text" class="form-control" id="libraryCard" name="libraryCard">
                                        </div>
                                    </div>
                                </div>
        
                                <input type="text" id="memberId" name="memberId" hidden>
        
                                <div class="mb-3">
                                    <label for="memberName" class="form-label">FullName</label>
                                    <input type="text" class="form-control" name="memberName" id="memberName" readonly>
                                </div>
        
                                <div class="mb-3">
                                    <label for="emailValue" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="emailValue" id="emailValue" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="memberGroupValue" class="form-label">Member Group</label>
                                    <input type="text" class="form-control" name="memberGroupValue" id="memberGroupValue" readonly>
                                </div>
        
                                <div class="mb-3 d-none">
                                    <label for="courseValue" class="form-label">Year & Course / Department</label>
                                    <input type="text" class="form-control" name="courseValue" id="courseValue" readonly>
                                </div>
                            </div>
    
                           <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="studentNo" class="form-label">Student No. / Employee No.</label>
                                    <input type="text" class="form-control" name="studentNo" id="studentNo" readonly>
                                </div>
    
                                <div class="mb-3">
                                    <label for="phoneValue" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phoneValue" id="phoneValue" readonly>
                                </div>
    
                                <div class="mb-3">
                                    <label for="addressValue" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="addressValue" id="addressValue" readonly>
                                </div>
    
                                <div class="mb-3">
                                    <label for="end_borrow" class="form-label">Return Date*</label>
                                    <input type="date" class="form-control" id="end_borrow" name="end_borrow">
                                </div>
                           </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- Previous Button (for Step 2) -->
                        <button type="button" class="btn btn-secondary" id="prevBorrowBtn"
                            style="display: none;">Previous</button>
                        <!-- Submit Button -->
                        <button type="button" class="btn" id="submitBorrowBtn"
                            style="display: none; background-color: #193c71; color: #fff;">Submit</button>
                        <!-- Next Button (for Step 1) -->
                        <button type="button" class="btn" id="nextBorrowBtn"
                            style="background-color: #193c71; color: #fff;">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="bookBorrowConfirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #193c71; color: #fff;">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Book Borrow</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to borrow this book?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="bookBorrowCancelConfirmationBtn"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="bookBorrowConfirmSubmit"
                    style="background-color: #193c71; color: #fff;">Yes</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Ensure that the DOM is fully loaded before running JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        // Handle navigation between steps
        document.getElementById('nextBorrowBtn').addEventListener('click', function () {
            // Show step 2 and hide step 1
            document.getElementById('borrowStep1').classList.add('d-none');
            document.getElementById('borrowStep2').classList.remove('d-none');
            document.getElementById('nextBorrowBtn').style.display = 'none'; // Hide next button
            document.getElementById('prevBorrowBtn').style.display = 'inline-block'; // Show previous button
            document.getElementById('submitBorrowBtn').style.display = 'inline-block'; // Show submit button
        });

        // Handle going back to step 1
        document.getElementById('prevBorrowBtn').addEventListener('click', function () {
            // Show step 1 and hide step 2
            document.getElementById('borrowStep1').classList.remove('d-none');
            document.getElementById('borrowStep2').classList.add('d-none');
            document.getElementById('prevBorrowBtn').style.display = 'none'; // Hide previous button
            document.getElementById('nextBorrowBtn').style.display = 'inline-block'; // Show next button
            document.getElementById('submitBorrowBtn').style.display = 'none'; // Hide submit button
        });


        // Book Form - Show confirmation modal when "Add Book" button is clicked
        document.getElementById('submitBorrowBtn')?.addEventListener('click', function () {
            $('#borrowModal').modal('hide');  // Hide the "Add Book" modal
            $('#bookBorrowConfirmModal').modal('show');  // Show the confirmation modal
        });

        // Submit Book Form when confirmation modal confirms the action
        document.getElementById('bookBorrowConfirmSubmit')?.addEventListener('click', function () {
            document.getElementById('borrowForm').submit();
        });

        // Cancel Book Form submission, re-show the "Add Book" modal
        document.getElementById('bookBorrowCancelConfirmationBtn')?.addEventListener('click', function () {
            $('#borrowModal').modal('show');  // Show the "Add Book" modal
            $('#bookBorrowConfirmModal').modal('hide');  // Hide the confirmation modal
        });

        // Add Book - Ensure the "Add Book" modal reappears if the confirmation modal is closed
        $('#bookBorrowConfirmModal').on('hidden.bs.modal', function () {
            $('#borrowModal').modal('show');
        });


        //For return date
        let today = new Date();
        let returnDate = new Date();
        returnDate.setDate(today.getDate() + 3); // Set to 3 days from today

        // Format the date in yyyy-mm-dd format (required for input[type="date"])
        let formattedReturnDate = returnDate.toISOString().split('T')[0];
        document.getElementById('end_borrow').value = formattedReturnDate;

        // Disable past dates (including today)
        let formattedToday = today.toISOString().split('T')[0];
        document.getElementById('end_borrow').setAttribute('min', formattedToday);



        // For disabled next button
        // Get the elements
        const accessionField = document.getElementById('accession');
        const nextBorrowBtn = document.getElementById('nextBorrowBtn');
        const submitBorrowBtn = document.getElementById('submitBorrowBtn');

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

        const libraryCardField = document.getElementById('libraryCard');

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


    // Ajax for Borrow Data
    $(document).on('input', '#accession, #libraryCard', function () {
        var accession = $('#accession').val();  // Get the value of the #accession input field
        var libraryCard = $('#libraryCard').val();  // Get the value of the #libraryCard input field

        $.ajax({
            type: 'POST',
            url: "{{ route('get.data.borrow') }}",  // Make sure this route is correct
            data: {
                accession: accession,  // Send the accession value
                libraryCard: libraryCard,  // Send the library card value
                _token: '{{ csrf_token() }}'  // CSRF Token for security
            },
            dataType: "JSON",
            success: function (data) {
                // Reset fields first to avoid showing old data
                $('#titleValue').val('');
                $('#bookid').val('');
                $('#authorValue').val('');
                $('#copiesValue').val('');
                $('#isbnValue').val('');
                $('#isbn13Value').val('');
                $('#call_numberValue').val('');
                $('#pagesValue').val('');
                $('#memberName').val('');
                $('#memberId').val('');
                $('#memberGroupValue').val('');
                $('#courseValue').val('');
                $('#studentNo').val('');
                $('#emailValue').val('');
                $('#phoneValue').val('');
                $('#addressValue').val('');

                if (data.status === 'success') {
                    // If data.accession is available, display book data
                    if (data.accession) {
                        $('#titleValue').val(data.accession.title);
                        $('#bookid').val(data.accession.id);
                        $('#authorValue').val(data.accession.author);
                        $('#copiesValue').val(data.accession.total_copies);
                        $('#isbnValue').val(data.accession.isbn);
                        $('#isbn13Value').val(data.accession.isbn13);
                        $('#call_numberValue').val(data.accession.call_no);
                        $('#pagesValue').val(data.accession.pages);

                        console.log(data.accession.id);
                    }

                    // If data.libraryCard is available, display member data
                    if (data.libraryCard) {
                        $('#memberName').val(data.libraryCard.name);
                        $('#memberId').val(data.libraryCard.id);
                        $('#memberGroupValue').val(data.libraryCard.member_group);
                        $('#courseValue').val(data.libraryCard.year_and_course);
                        $('#studentNo').val(data.libraryCard.student_no);
                        $('#emailValue').val(data.libraryCard.email);
                        $('#phoneValue').val(data.libraryCard.phone);
                        $('#addressValue').val(data.libraryCard.address);

                        console.log(data.libraryCard.id);
                    }
                } else {
                    // Handle error message if no data found
                    $('#response-message').html('<span style="color: red;">' + data.message + '</span>');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', status, error);  // Log any errors
                $('#response-message').html('<span style="color: red;">An error occurred. Please try again later.</span>');
            }
        });
    });

</script>