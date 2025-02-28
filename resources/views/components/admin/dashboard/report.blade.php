<!-- HTML structure to display the total books -->
<div class="col col-12 p-0 pb-1 pt-1" style="height: fit-content; min-height: 12rem;">
    <a href="{{ route('admin.book') }}" style="text-decoration: none; color: inherit;">
        <div class="card" >
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>{{ $allBookCount }}</h2>

                <div style="background: #193c71; padding: 0.5rem; border-radius: 50%;">
                    <i class="bi bi-clock-fill" style="color: white"></i>
                </div>
            </div>

            <hr class="m-0">

            <div class="card-body">
        <p>Overall Books</p>
            </div>
        </div>
    </a>
</div>

<div class="col col-12 p-0 pt-1 pb-1" style=" height: fit-content; min-height: 12rem;">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2>{{$allAvailableBook}}</h2>
            <div style="background: #193c71;">
            <i class="bi bi-book-fill"></i>
            </div>

        </div>

        <hr class="m-0">

        <div class="card-body">
            <p>Available Books</p>
        </div>
    </div>
</div>

<div class="col col-12 p-0 pt-1 pb-1" style="height: fit-content; min-height: 12rem;">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2>{{ $borrowedBookCount }}</h2>

            <div style="background: #193c71;">
                <i class="bi bi-journal-text"></i>
            </div>

        </div>

        <hr class="m-0">

        <div class="card-body">
            <p>Borrowed Books</p>
        </div>
    </div>
</div>

<!-- HTML structure to display the total members -->
<div class="col col-12 p-0 pt-1 pb-1" style=" height: fit-content; min-height: 12rem;">
    <a href="{{ route('admin.member') }}" style="text-decoration: none; color: inherit;">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center " >
                <h2>{{ $allMemberCount }}</h2>

                <div style="background: #193c71;">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
            </div>

            <hr class="m-0">

            <div class="card-body">
                <p>Overall Members</p>
            </div>
        </div>
    </a>
</div>