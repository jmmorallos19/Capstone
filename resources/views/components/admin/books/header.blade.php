<div class="col col-12 table-header-container d-flex w-100 justify-content-betweeen flex-wrap pe-4 ps-2 pt-4 pb-3"
    style="max-height: max-content;">

    <div class="col col-12 ps-3 col-md-6 books-title-container">
        <h3 class="title m-0" style="font-weight: 800">BOOKS</h3>
        <p class="m-0">Manage your library books here.</p>
    </div>

    <div class="col col-12 col-md-6 pt-2 pt-md-0 books-btn-container d-flex align-items-center pe-3 justify-content-start justify-content-md-end gap-1">
        <button class="btn button-2 ms-3" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal">Add Book</button>
        {{-- Add Book Modal --}}
        @includeIf('components.addBookModal')

        <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#borrowModal">Lend</button>
        @includeIf('components.borrowModal')

        <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#returnModal">Return</button>
        @includeIf('components.returnModal')

        <button class="btn button-2" onclick="location.reload()">
            <i class="bi bi-arrow-clockwise"></i> Refresh
        </button>
    </div>
</div>