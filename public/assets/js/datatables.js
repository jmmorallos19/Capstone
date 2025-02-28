import 'datatables.net-bs5';
import $ from 'jquery';
window.$ = window.jQuery = $;


// Dashboard Table
// BookList
$(document).ready(function () {
    $('#bookList, #availableBooks table, #borrowed table, #borrower, #memberList, #returned table, #allBooks, #allMembers, #damagedBooksTable, #accounttable, #memberBookstable').DataTable({
        "paging": true,
        "searching": true,
        "order": [[0, 'asc']],
        "pageLength": 10,
        "responsive": true,
        "language": {
            "emptyTable": ""  // This will hide the "No data available in table" message
        }
    });

});


$(document).ready(function () {
    $('#auditLogtable').DataTable({
        "paging": true,
        "searching": true,
        "order": [[4, 'desc']],  // Sort by the 'Time' column (index 4) in descending order
        "pageLength": 10,
        "responsive": true,
        "language": {
            "emptyTable": ""  // This will hide the "No data available in table" message
        },
        "columnDefs": [
            {
                "targets": 3,  // Timestamp column (index 3)
                "type": "date",  // Ensure it's treated as a date for sorting
            },
            {
                "targets": 4,  // Time column (index 4)
                "render": function(data, type, row) {
                    if (type === 'sort') {
                        // Convert 12-hour time format to 24-hour for sorting (e.g., "10:03 PM" to "22:03")
                        var time = new Date('1970-01-01T' + data); // Use a fixed date for parsing
                        return time.getTime(); // Return the time in milliseconds for proper sorting
                    }
                    return data; // Return the time as is for display
                }
            }
        ]
    });
});




