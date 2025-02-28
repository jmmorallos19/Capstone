<x-admin-layout>
    <div class="ms-2 pb-5 me-2 mb-3 table-container"
    style="height: fit-content  !important; min-height: 82vh !important; max-height: fit-content !important;">
        <div class="archive-edit-headers d-flex w-100 justify-content-betweeen flex-wrap pe-4 ps-2 pt-3 pb-3"
            style="max-height: max-content;">
            <div class="col col-12 ps-3 col-md-6 archives-edit-title-container">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.archive') }}" style="font-size: 1.5rem;" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-title="Back"><i class="bi bi-arrow-90deg-left"
                            style="color: #193c71;  font-weight: 600 !important;"></i></a>
                    <h3 class="title m-0" style="font-weight: 800;">ARCHIVED BOOK DETAILS</h3>
                </div>
                <p class="m-0" style="padding-left: 2rem;">Manage archive details here.</p>
            </div>

            <div
                class="col col-12 col-md-6  d-flex align-items-center justify-content-start justify-content-md-end gap-1 pe-3 pt-2 pt-md-0 flex-wrap">
                {{-- Add Book --}}
                <button class="btn button-2" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal">Add
                    Book</button>
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
                                href="#info" role="tab">Info</a>
                        </li>
                        <li class="nav-item text-uppercase border-0" style="margin-left :.1rem;">
                            <a class="nav-link" style="font-size: .9rem;" id="details-tab" data-bs-toggle="tab"
                                href="#details" role="tab">Details</a>
                        </li>
                    </ul>
                </div>
        
                <!-- Tab Content -->
                <div class="tab-content info_div h-100">
                    <!-- Info Tab -->
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                        <!-- Book Info (Accession No. to Publisher) -->
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Accession No.</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0">{{ $archive->accession_no }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Copies</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->total_copies }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Title</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->title }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Author</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->author }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">ISBN</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->isbn }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">ISBN 13</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->isbn13 }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Shelf Location</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->call_no }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Edition</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->edition }}</p>
                            </div>
                        </div>
                    </div>
        
        
        
                    <!-- Details Tab -->
                    <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Publisher</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->publisher }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Year</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->publication_year }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Volume</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->volume }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Pages/Duration</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->pages }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Subject</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->subject }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Abstract</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->abstract }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">Description</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->description }}</p>
                            </div>
                        </div>
                        <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                            style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                            <div class="col-3 text-end">
                                <p class="m-0">Bibliography</p>
                            </div>
                            <div class="col-8">
                                <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $archive->bibliography }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>