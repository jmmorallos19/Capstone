import 'datatables.net-bs5';
import $ from 'jquery';
window.$ = window.jQuery = $;


// Dashboard Table
// BookList
$(document).ready(function () {
    $('#bookList, #availableBooks table, #borrowed table, #borrower, #memberList, #returned table, #allBooks, #allMembers, #damagedBooksTable, #auditLogtable').DataTable({
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



