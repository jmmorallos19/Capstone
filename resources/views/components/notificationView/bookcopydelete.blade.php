<div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
    <!-- Book Info (Accession No. to Publisher) -->
    <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
        style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
        <div class="col-6 text-end">
            <p class="m-0">Action :</p>
        </div>
        <div class="col-5">
            <p class="m-0">{{ $notification->type }}</p>
        </div>
    </div>
    <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
        style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
        <div class="col-6 text-end">
            <p class="m-0">Staff / Admin FullName:</p>
        </div>
        <div class="col-5">
            <p class="m-0">{{ $notification->user->firstname . ' ' . $notification->user->lastname }} ({{ strtoupper($notification->user->role) }})</p>
        </div>
    </div>
    <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
        style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
        <div class="col-6 text-end">
            <p class="m-0">Book Accession No. :</p>
        </div>
        <div class="col-5">
            <p class="m-0">{{ $notification->book->accession_no }}</p>
        </div>
    </div>
    <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
        style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
        <div class="col-6 text-end">
            <p class="m-0">Book Title :</p>
        </div>
        <div class="col-5">
            <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $notification->book->title }}</p>
        </div>
    </div>
    <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
        style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
        <div class="col-6 text-end">
            <p class="m-0">Book Author :</p>
        </div>
        <div class="col-5">
            <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $notification->book->author }}</p>
        </div>
    </div>
    <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
        style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
        <div class="col-6 text-end">
            <p class="m-0">Description :</p>
        </div>
        <div class="col-5">
            <p class="m-0" >{{ $notification->description }}</p>
        </div>
    </div>
    <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
        style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
        <div class="col-6 text-end">
            <p class="m-0">Time :</p>
        </div>
        <div class="col-5">
            <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ \Carbon\Carbon::parse($notification->created_at)->timezone('Asia/Manila')->format('g:i A') }}</p>
        </div>
    </div>
    <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
        style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
        <div class="col-6 text-end">
            <p class="m-0">Date :</p>
        </div>
        <div class="col-5">
            <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ \Carbon\Carbon::parse($notification->created_at)->timezone('Asia/Manila')->format('M d Y') }}</p>
        </div>
    </div>
</div>