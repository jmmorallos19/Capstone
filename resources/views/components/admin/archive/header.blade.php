<div class="col col-12 table-header-container d-flex w-100 justify-content-between flex-wrap pe-4 ps-2 pt-4"
    style="max-height: max-content;">

    <div class="col col-12 ps-3 col-md-6">
        <h3 class="title m-0" style="font-weight: 800">Archive Books</h3>
        <p class="mb-2">Manage and view archived book pages to keep your collection organized and accessible for future reference.</p>
    </div>    

    <div class="col col-12 col-md-6 d-flex align-items-center justify-content-start justify-content-md-end gap-1 pe-3 pt-2 pt-md-0 pb-3 pb-md-0 flex-wrap">
        <button class="btn button-2 ms-3" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal">Add Book</button>
        {{-- Add Book Modal --}}
        @includeIf('components.addBookModal')

        {{-- Add Member Button --}}
        <button class="btn button-2" type="button" data-bs-toggle="modal" data-bs-target="#addMemberModal">Add
            Member</button>
        @includeIf('components.addMemberModal')
        
        {{-- Borrow Book Modal --}}
        <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#borrowModal">Lend</button>
        @includeIf('components.borrowModal')

        {{-- Return Book Modal --}}
        <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#returnModal">Return</button>
        @includeIf('components.returnModal')

    </div>
</div>
