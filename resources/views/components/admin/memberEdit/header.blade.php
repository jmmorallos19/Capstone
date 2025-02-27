<div class="book-edit-headers d-flex w-100 justify-content-betweeen flex-wrap pe-4 ps-2 pt-3 pb-3"
    style="max-height: max-content;">
    <div class="col col-12 ps-3 col-md-6 books-edit-title-container">
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.member') }}" style="font-size: 1.5rem;"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Back"><i class="bi bi-arrow-90deg-left" style="color: #193c71;  font-weight: 600 !important;"></i></a>
            <h3 class="title m-0" style="font-weight: 800;">MEMBER DETAILS</h3>
        </div>
        <p class="m-0" style="padding-left: 2rem;">Manage member details here.</p>
    </div>

    <div class="col col-12 col-md-6  d-flex align-items-center justify-content-start justify-content-md-end gap-1 pe-3 pt-2 pt-md-0 flex-wrap">
        {{-- Add Member Button --}}
        <button class="btn button-2" type="button" data-bs-toggle="modal" data-bs-target="#addMemberModal">Add
            Member</button>
        @includeIf('components.addMemberModal')

        {{-- Edit Member Info Button --}}
        <button class="btn button-2" type="button" data-bs-toggle="modal" data-bs-target="#editMemberModal">Edit
            Member Info</button>
        @includeIf('components.editMemberModal')

        {{-- Borrow Book Modal --}}
        <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#borrowModal">Lend</button>
        @includeIf('components.borrowModal')

        {{-- Return Book Modal --}}
        <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#returnModal">Return</button>
        @includeIf('components.returnModal')
    </div>
</div>