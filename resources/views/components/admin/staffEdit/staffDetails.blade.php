<div class="details-container d-flex flex-column flex-lg-row">
    <div class="col col-12 p-0" style="background-color: #E9F0FA; height: fit-content;">
        <div class="col col-12" style="background-color: #193c71;">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" style="border-bottom: 4px solid #193c71;" role="tablist">
                <li class="nav-item text-uppercase border-0">
                    <a class="nav-link active" style="font-size: .9rem;" id="info-tab" data-bs-toggle="tab"
                        href="#info" role="tab">Staff Information</a>
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
                        <p class="m-0">Firstname</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0">{{ $staff->firstname }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Middlename</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0">{{ $staff->middlename }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Lastname</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0">{{ $staff->lastname }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Contact Number</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0">{{ $staff->phone  }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">School Email</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ is_null($staff->school_email) ?  $staff->staff_school_email : $staff->school_email}}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Account Email</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{is_null($staff->email) ?  $staff->staff_email : $staff->email }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Status</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $staff->status }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>