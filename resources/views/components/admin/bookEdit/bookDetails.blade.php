<div class="details-container d-flex flex-column flex-lg-row">
    <div class="col col-lg-8 col-12 p-0" style="background-color: #E9F0FA; height: fit-content;">
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
                        <p class="m-0">{{ $book->accession_no }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Copies</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->total_copies }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Title</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->title }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Author</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->author }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">ISBN</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->isbn }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">ISBN 13</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->isbn13 }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Shelf Location</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->call_no }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Edition</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->edition }}</p>
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
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->publisher }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Year</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->publication_year }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Volume</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->volume }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Pages/Duration</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->pages }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Subject</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->subject }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Abstract</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->abstract }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">Description</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->description }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Bibliography</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $book->bibliography }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="barcode-container pt-4 pb-4 d-flex flex-column gap-3 justify-content-center align-items-center col">
        <img src="{{ asset($book->barcode) }}" alt="barcode" id="barcode_image"
            style="width: 12rem; height: 7rem;">

        <button class="btn button-2 ps-4 pe-4 mb-5" onclick="print()">Print</button>
    </div>
</div>