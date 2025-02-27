<x-admin-layout>
    <div class="container-fluid p-0 d-flex flex-column-reverse flex-lg-row" style="column-gap: .5rem;">
        <div class="table-container dashboard-table-container pe-0 ps-0 pt-0 col w-100 mt-3 mt-md-0 col">
            <div class="card mb-0" style="height: 100%;"> 
                <div class="actionBtnContainer col-12 d-flex align-items-center justify-content-between flex-md-row flex-column">
                    <div class="card-header">
                        <h3 class="card-header-h3">BookLists</h3>
                    </div>
                    <div class="pe-md-4 pe-0 pb-md-0 pb-3 d-flex gap-2 flex-wrap justify-content-center">
                        <button class="w-min-fit button-2 pt-1 pb-1 ps-3 pe-3" style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#addMemberModal">Add Member</button>
                        @includeIf('components.addMemberModal')

                        <button class="w-min-fit button-2 pt-1 pb-1 ps-3 pe-3" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal">Add Book</button>
                        @includeIf('components.addBookModal')

                        <button class="w-min-fit button-2 pt-1 pb-1 ps-3 pe-3" style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#borrowModal">Lend</button>
                        @includeIf('components.borrowModal')

                        <button class="w-min-fit button-2 pt-1 pb-1 ps-3 pe-3" style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#returnModal">Return</button>
                        @includeIf('components.returnModal')
                    </div>
                </div>

                <div class="col-12" style="background-color: #193c71;">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs ps-1" style="border-bottom: 4px solid #193c71;" role="tablist">
                      <li class="nav-item text-uppercase border-0">
                        <a class="nav-link active" style="font-size: .9rem;" id="info-tab" data-bs-toggle="tab"
                          href="#booksList" role="tab">Books List</a>
                      </li>
                      
                      <li class="nav-item text-uppercase border-0" style="margin-left: .1rem;">
                        <a class="nav-link" style="font-size: .9rem;" id="member-list-tab" data-bs-toggle="tab"
                          href="#memberlist" role="tab">Member List</a>
                      </li>

                      <li class="nav-item text-uppercase border-0" style="margin-left: .1rem;">
                        <a class="nav-link" style="font-size: .9rem;" id="borrowers-tab" data-bs-toggle="tab"
                          href="#borrowers" role="tab">Borrowers</a>
                      </li>

                      <li class="nav-item text-uppercase border-0" style="margin-left: .1rem;">
                        <a class="nav-link" style="font-size: .9rem;" id="returned-tab" data-bs-toggle="tab" href="#returned"
                          role="tab">Returned</a>
                      </li>
                    </ul>
                </div>
      
                 <!-- Tab Content -->
                <div class="tab-content info_div " style="width: 100%;"> 

                    <div class="tab-pane show active" id="booksList" role="tabpanel" aria-labelledby="info-tab"> 
                        @includeIf('components.admin.dashboard.bookList')
                    </div>

                    <div class="tab-pane" id="memberlist" role="tabpanel" aria-labelledby="info-tab"> 
                        @includeIf('components.admin.dashboard.memberList')
                    </div>

                    <div class="tab-pane" id="borrowers" role="tabpanel" aria-labelledby="info-tab"> 
                        @includeIf('components.admin.dashboard.borrower')
                    </div>

                    <div class="tab-pane" id="returned" role="tabpanel" aria-labelledby="info-tab"> 
                        @includeIf('components.admin.dashboard.returned')
                    </div>

                </div>
            </div>
        </div>
    
        <div class="reportCard_div col col-lg-3 col-12  d-flex align-items-center flex-wrap">
            @includeif('components.admin.dashboard.report')
        </div>
          
    </div>

    <script>
        // Listen for the tab change event
        const tabs = document.querySelectorAll('.nav-link');
        const cardHeader = document.querySelector('.card-header-h3');

        // Function to update the card header based on the active tab
        function updateCardHeader() {
            const activeTab = document.querySelector('.nav-link.active');
            if (activeTab) {
                const activeTabText = activeTab.textContent.trim();
                cardHeader.textContent = `${activeTabText}`; // Append 'List' to the active tab's text
            }
        }

        // Initially set the card header on page load (in case a tab is pre-selected)
        updateCardHeader();

        // Add event listeners for tab activation
        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', updateCardHeader);
        });


    </script>
</x-admin-layout>