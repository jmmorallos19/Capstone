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
            if (data.status === 'success') {
                // If data.accession is available, display book data
                if (data.accession) {
                    $('#titleValue').val(data.accession.title);
                    $('#bookid').val(data.accession.id);
                    $('#authorValue').val(data.accession.author);
                    $('#categoriesValue').val(data.accession.category);
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
                // Handle error message
                $('#response-message').html('<span style="color: red;">' + data.message + '</span>');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);  // Log any errors
            $('#response-message').html('<span style="color: red;">An error occurred. Please try again later.</span>');
        }
    });
});