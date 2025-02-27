<x-admin-layout>
    <div class="ms-2 pb-5 me-2 mb-3 table-container"
    style="height: fit-content  !important; min-height: 82vh !important; max-height: fit-content !important;">
        <div class="book-edit-headers d-flex w-100 justify-content-betweeen flex-wrap pe-4 ps-2 pt-3 pb-3"
            style="max-height: max-content;">

            <div class="col col-12 ps-3 col-md-6 notification-details-title-container">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.notification') }}" style="font-size: 1.5rem;" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-title="Back">
                        <i class="bi bi-arrow-90deg-left" style="color: #193c71; font-weight: 600 !important;"></i>
                    </a>
                    <h3 class="title m-0" style="font-weight: 800;">Notification Details</h3>
                </div>
                <p class="m-0" style="padding-left: 2rem;">View the details of this notification.</p>
            </div>


            <div
                class="col col-12 col-md-6  d-flex align-items-center justify-content-start justify-content-md-end gap-1 pe-3 pt-2 pt-md-0 flex-wrap">
                {{-- Add Member Button --}}
                <button class="btn button-2" type="button" data-bs-toggle="modal" data-bs-target="#addMemberModal">Add
                    Member</button>
                @includeIf('components.addMemberModal')

                <button class="btn button-2" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal">Add Book</button>
                {{-- Add Book Modal --}}
                @includeIf('components.addBookModal')

                {{-- Borrow Book Modal --}}
                <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button"
                    data-bs-toggle="modal" data-bs-target="#borrowModal">Lend</button>
                @includeIf('components.borrowModal')

                {{-- Return Book Modal --}}
                <button class="w-min-fit btn button-2 " style="white-space: nowrap;" type="button"
                    data-bs-toggle="modal" data-bs-target="#returnModal">Return</button>
                @includeIf('components.returnModal')
            </div>
        </div>

        <div class="details-container d-flex flex-column flex-lg-row">
            <div class="col col-12 p-0" style="background-color: #E9F0FA; height: fit-content;">
                <div class="col col-12" style="background-color: #193c71;">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs" style="border-bottom: 4px solid #193c71;" role="tablist">
                        <li class="nav-item text-uppercase border-0">
                            <a class="nav-link active" style="font-size: .9rem;" id="info-tab" data-bs-toggle="tab"
                                href="#info" role="tab">Details</a>
                        </li>
                    </ul>
                </div>
        
                <!-- Tab Content -->
                <div class="tab-content info_div h-100">
                    <!-- Info Tab -->
                    @if ($notification->type == 'Lent Book' || $notification->type == 'Returned Book')

                        @includeIf('components.notificationView.lentAndreturn')

                    @endif

                    @if ($notification->type == 'Lent Book Copy' || $notification->type == 'Returned Book Copy')

                        @includeIf('components.notificationView.lentCopyAndreturnCopy')

                    @endif

                    @if ($notification->type == 'Added a Book' || $notification->type == 'Updated Book' || $notification->type == 'Archived Book')

                        @includeIf('components.notificationView.bookaction')

                    @endif

                    @if ($notification->type == 'Added new book copy' || $notification->type == 'Updated Book Copy')

                        @includeIf('components.notificationView.bookcopyaction')

                    @endif

                    @if ($notification->type == 'Deleted Book Copy')

                        @includeIf('components.notificationView.bookcopydelete')

                    @endif

                    @if ($notification->type == 'Added a Member' || $notification->type == 'Updated Member Details')

                        @includeIf('components.notificationView.memberaction')

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>