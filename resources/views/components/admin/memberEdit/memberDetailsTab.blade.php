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
                    <a class="nav-link" style="font-size: .9rem;" id="memberBorrowedBooks-tab" data-bs-toggle="tab"
                        href="#memberBorrowedBooks" role="tab">Borrowed Books</a>
                </li>
                <li class="nav-item text-uppercase border-0" style="margin-left :.1rem;">
                    <a class="nav-link" style="font-size: .9rem;" id="details-tab" data-bs-toggle="tab"
                        href="#memberID" role="tab">member ID</a>
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
                        <p class="m-0">Library Card No.</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0">{{ $member->library_card_no }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">FullName</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->name }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Member Group</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->member_group }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    @if ($member->member_group === 'Faculty')
                        <div class="col-3 text-end">
                            <p class="m-0">Department</p>
                        </div>
                    @else
                        <div class="col-3 text-end">
                            <p class="m-0">Year & Course </p>
                        </div>
                    @endif
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->year_and_course }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    @if ($member->member_group === 'Faculty')
                        <div class="col-3 text-end">
                            <p class="m-0">Employee No.</p>
                        </div>
                    @else
                        <div class="col-3 text-end">
                            <p class="m-0">Student No.</p>
                        </div>
                    @endif
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->student_no }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">School Email</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->email }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Phone</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->phone }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Address</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->address }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Name of Guardian</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->name_of_guardian }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Guardian Address</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->guardian_address }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Guardian Contact</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->guardian_phone }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Book Limit Status</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">{{ $member->currently_borrowed_books }}/{{ $member->total_books_allowed }}</p>
                    </div>
                </div>
                <div class="col col-12 p-0 d-flex flex-wrap gap-3 p-2"
                    style="border-bottom: 1px solid rgba(195, 195, 195, 0.5);">
                    <div class="col-3 text-end">
                        <p class="m-0">Total fines</p>
                    </div>
                    <div class="col-8">
                        <p class="m-0" style="text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden !important;">₱{{ $member->total_fines }}</p>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade w-100 overflow-y-auto overflow-x-hidden p-3 pt-0 " style="background-color: white; height: fit-content; max-height: 90%;" id="memberBorrowedBooks" role="tabpanel" aria-labelledby="details-tab">
                <table class="table table-striped" id="memberBookstable" style="table-layout: fixed;">
                    <thead class="position-sticky top-0" style="background-color: #fff; z-index: 1;">
                        <tr>
                            <th>Accession No.</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Fines</th>
                            <th>Borrowed at</th>
                            <th>Due date</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($memberBorrowedBooks as $memberBorrowedBook)

                        @if (is_null($memberBorrowedBook->book_accession))
                            <tr>
                                <td>{{ $memberBorrowedBook->book_copy_accession }}</td>
                                <td>{{ $memberBorrowedBook->bookCopy->title }}</td>
                                <td class="text-capitalize" style="{{ $memberBorrowedBook->status !== 'Currently Borrowed' ? 'color: red; font-weight: 500;' : 'color: green; font-weight: 500;' }}">{{ $memberBorrowedBook->status }}</td>
                                
                                @if ($memberBorrowedBook->status === 'returned')
                                    <td>₱0</td>
                                @else
                                    <td>₱{{ $memberBorrowedBook->fines }}</td>
                                @endif

                                <td>
                                    <p class="m-0">{{ \Carbon\Carbon::parse($memberBorrowedBook->borrowed_at)->timezone('Asia/Manila')->format('d M Y')}}</p>
                                </td>

                                @if ($memberBorrowedBook->member->member_group === 'Faculty')
                                    <td>No due date</td>
                                @else
                                    <td>{{ \Carbon\Carbon::parse($memberBorrowedBook->due_date)->format('d M Y') }}</td>
                                @endif
                            </tr>
                        @else
                            <tr>
                                <td>{{ $memberBorrowedBook->book_accession }}</td>
                                <td>{{ $memberBorrowedBook->book->title }}</td>
                                <td class="text-capitalize" style="{{ $memberBorrowedBook->status !== 'Currently Borrowed' ? 'color: red; font-weight: 500;' : 'color: green; font-weight: 500;' }}">{{ $memberBorrowedBook->status }}</td>
                                
                                @if ($memberBorrowedBook->status === 'returned')
                                    <td>₱0</td>
                                @else
                                    <td>₱{{ $memberBorrowedBook->fines }}</td>
                                @endif

                                <td>
                                    <p class="m-0">{{ \Carbon\Carbon::parse($memberBorrowedBook->borrowed_at)->timezone('Asia/Manila')->format('d M Y')}}</p>
                                </td>


                                @if ($memberBorrowedBook->member->member_group === 'Faculty')
                                    <td>No due date</td>
                                @else
                                    <td>{{ \Carbon\Carbon::parse($memberBorrowedBook->due_date)->format('d M Y') }}</td>
                                @endif
                            </tr>
                        @endif

                       @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Details Tab -->
            <div class="tab-pane fade" id="memberID" role="tabpanel" aria-labelledby="details-tab">
                {{-- Member ID HERE --}}
                <div id="card" class="printable_area d-flex justify-content-center flex-wrap gap-3 p-2  p-0">
                    <!-- Front -->
                    <div class="p-0" style="height: 325px; width: 530px; background-color: #ffffff;">
                        <div id="header" style="position: relative;">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo"
                                style="width: 65px; position: absolute; right: 2%; bottom: 7%; border: 1px solid #FFD93C; border-radius: 50%;">
                            <div class="p-1 ps-2" id="header_title">
                                <p class="text-uppercase fw-bold" style="letter-spacing: .1rem; font-size: 1.1rem;">Immaculada
                                    Concepcion College</p>
                                <p style="font-size: .7rem;">Soldier's Hills, <span class="m-0"
                                        style="font-size: .7rem">|||</span> Subdivision, Barangay 180, Tala, North Caloocan City</p>
                            </div>
                
                            @php
                                $group = $member->member_group;
                                $bgColor = '';
                                $text = '';
                                $display = '';
                                $margin = '';
                                $level = '';
                
                                if ($group === "College") {
                                    $bgColor = 'blue';
                                    $text = 'white';
                                    $display = 'block';
                                    $margin = '.2rem';
                                    $level = 'College Library Card';
                                } elseif ($group === "BASIC EDUCATION" || $group === "Basic Education") {
                                    $bgColor = 'green';
                                    $text = 'white';
                                    $display = 'block';
                                    $margin = '.2rem';
                                    $level = 'Basic Ed. School Library Card';
                                } elseif ($group === "SENIOR HIGH SCHOOL" || $group === "Senior High School") {
                                    $bgColor = '#FFD93C';
                                    $text = 'black';
                                    $display = 'none';
                                    $margin = '.5rem';
                                    $level = 'Senior High School Library Card';
                                } elseif ($group === "FACULTY" || $group === "Faculty") {
                                    $bgColor = '#da4316';
                                    $text = 'white';
                                    $display = 'block';
                                    $margin = '.5rem';
                                    $level = 'Faculty Library Card';
                                }
                                 else {
                                    $bgColor = 'transparent';
                                    $text = 'white';
                                    $display = 'block';
                                    $margin = '.2rem';
                                }
                            @endphp
                
                            <div id="palaman" style="display: {{ $display }};"></div>
                
                            <div id="header_course m-0">
                                <p class="text-uppercase fw-bold text-center"
                                    style="padding: .3rem; font-size: .9rem; margin-bottom: {{ $margin }}; color: {{ $text }}; background-color: {{ $bgColor }};">
                                    {{ $level }}
                                </p>
                            </div>
                
                        </div>
                
                        <div class="main d-flex" style="background-color: #ffffff; height: fit-content; position: relative;">
                            <div class="pt-1 ps-2" style="width: 30%;">
                                <img src="{{ asset($member->image_url) }}" alt="image" style="width: 111px; height: 111px;">
                            </div>
                
                            <div class="pt-2 pe-2 ps-2 pb-0" style="width: 80%;">
                                <img src="{{ asset('college.jpg') }}" alt="college"
                                    style="width: 120px; border-radius: 50%; position: absolute; right: 2%; bottom: -32%; opacity: 0.5;">
                                <div style="width: 90%;">
                                    <p class="text-uppercase m-0 fw-bold" style="font-size: 1rem;">Name: {{ $member->name }}</p>
                                    <p class="text-uppercase m-0 fw-bold" style="font-size: 1rem;">Course: {{ $member->course }}</p>
                                    <p class="text-uppercase m-0 fw-bold" style="font-size: 1rem;">Library Card No. :{{' ' . $member->library_card_no}}</p>
                                    @php
                                        $currentYear = \Carbon\Carbon::now()->year;
                                        $nextYear = $currentYear + 1;
                                    @endphp

                                    <p class="fw-bolder mt-0 mb-0" style="font-size: 1rem;">A.Y: {{ $currentYear }}-{{ $nextYear }}</p>

                                </div>
                            </div>
                        </div>
                
                        <div id="barcode" class="mt-3 ps-2" style="position: relative;">
                            <img src="{{ asset($member->barcode) }}"
                                alt="barcode" style="width: 200px; height: 80px;">
                            <img src="{{ asset('assets/images/college.jpg') }}" class="z-3" alt="college" style="position: absolute; opacity: 0.5; width: 120px; border-radius: 50%; right: 4%; bottom: 0%;">
                        </div>
                    </div>
                
                    <!-- Back -->
                    <div class="p-1 z-1" style="height: 325px; width: 530px; background-color: #ffffff; position: relative;">
                        <img class="z-3" src="{{ asset('assets/images/logo.jpg') }}" alt="logo"
                            style="position: absolute; bottom: 8%; left: 40%; border-radius: 50%; width: 85px; opacity: 0.5;">
                        <div class="z-2" style="width: 100%;">
                            <p class="text-uppercase text-center fw-bold m-0">In case of emergency</p>
                            <div class="pt-2" style="padding: .1rem .5rem;">
                                <p class="m-0" style="font-size: .9rem;">Name of Guardian: <b>{{ $member->name_of_guardian }}</b></p>
                                <p class="m-0" style="font-size: .9rem; overflow-wrap: break-word;">Address: <b>{{ $member->guardian_address }}</b></p>
                                <p class="m-0" style="font-size: .9rem;">Contact #: <b>{{ $member->guardian_phone }}</b></p>
                            </div>
                        </div>
                
                        <div class="d-flex justify-content-center align-content-center z-2 mt-2 p-1" style="width: 100%;">
                            <div style="border: 1px solid #000; width: 90%; padding: .2rem;">
                                <p class="m-0" style="font-size: .8rem;">THIS CARD:</p>
                                <ul class="mb-0">
                                    <li style="font-size: .7rem;">- Is non-transferable</li>
                                    <li style="font-size: .7rem;">- Entitles the holder to borrow library materials</li>
                                    <li style="font-size: .7rem; overflow-wrap: break-word;">- When lost, holder must pay <span class="fw-bold">Php 100.00</span> at the cashier for issuance of Library ID.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                

                </div>
                
                <div class="d-flex justify-content-end pe-3 pb-3 pt-2" style="width: 100%;">
                    <button type="button" class="button-2 btn books_button p-1" style="width: 100px;"
                        onclick="printCard();">
                        Print
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .main-content { 
    background-color: #fff;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
    border-radius: 0;
    height: 100vh;  /* Adjust if necessary */

    }

    #member_image{
        height: 35rem;
        max-height: 35rem;
    }

    #header_title{
        background-color: #193C71;
        
    }

    #header_title > p{
        margin: 0;
        color: #fff; 
    }

    #palaman{
        height: .4rem; 
        background-color: #FFD93C !important;
    }

    #header_course >p{
        margin: 0;
        color: #fff; 
    }

    @media print {
        body * {
            visibility: hidden; /* Hide everything */
        }
        #card, #card * {
            visibility: visible; /* Show only the card */
        }
        #card > div{
            border: 1px solid #000;
        }
        #card {
            position: absolute; /* Position it to print correctly */
            left: 0;
            top: 0;
        }
    }
</style>

<script>
    function printCard() {
        window.print();
    }
</script>