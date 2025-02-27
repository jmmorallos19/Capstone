<div class="book-edit-headers d-flex w-100 justify-content-betweeen flex-wrap pe-4 ps-2 pt-3 pb-3"
    style="max-height: max-content;">
    <div class="col col-12 ps-3 col-md-6 books-edit-title-container">
        <div class="d-flex align-items-center gap-2">
            <h3 class="title m-0" style="font-weight: 800;">BOOK COPY DETAILS</h3>
        </div>
        <p class="m-0">Manage book copy details here.</p>
    </div>

    <div class="col col-12 col-md-6  d-flex align-items-center justify-content-start justify-content-md-end gap-1 pe-3 pt-2 pt-md-0 flex-wrap">
        {{-- Add Book --}}
        <button class="btn button-2" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal">Add
            Book</button>
        @includeIf('components.addBookModal')

        {{-- Edit BookCopy --}}
        <button class="btn button-2" type="button" data-bs-toggle="modal" data-bs-target="#editBookCopyModal">Edit
            Item</button>
        @includeIf('components.editBookCopyModal')

        {{-- Borrow Book Modal --}}
        <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#borrowModal">Lend</button>
        @includeIf('components.borrowModal')

        {{-- Return Book Modal --}}
        <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#returnModal">Return</button>
        @includeIf('components.returnModal')
    </div>
</div>

<script>
    function printBarcode() {
        // Get the barcode image element
        var printContents = document.getElementById('barcode_image').outerHTML;

        // Open a new print window
        var printWindow = window.open('', '', 'height=600,width=800');

        // Write content to the new print window
        printWindow.document.write('<html><head><title>Print Barcode</title>');
        printWindow.document.write('<style>');  
        printWindow.document.write('@media print { body { margin: 0; } #barcode_image { width: 100%; } }');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');

        // Inject the barcode image to be printed
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');

        // Close the document and trigger the print dialog
        printWindow.document.close();
        printWindow.print();
    }
</script>