<x-admin-layout>
    <div class="ms-2 pb-4 pt-4  me-2 mb-lg-5 mb-2 table-container"
        style="height: fit-content !important; min-height: 82vh !important; max-height: fit-content !important;">

        <div class="pieChart-container w-100 d-flex flex-wrap gap-4 justify-content-center" style="min-height: 100%;">
            <div class="col col-12 col-lg-4">
                <div class="card col col-12" style="height: 49%">
                    <div class="card-header" style="border-bottom: 1px solid rgb(219, 217, 217)">
                        <h3 class="m-0" style="font-size: 1.5rem">Member Reports</h3>
                    </div>
                    <div class="card-body p-3 d-flex justify-content-center align-items-center">
                        <canvas id="memberReport"></canvas>
                    </div>
                </div>

                <div class="card col-12" style="height: 49%">
                    <div class="card-header" style="border-bottom: 1px solid rgb(219, 217, 217)">
                        <h3 class="m-0 card-title" style="font-size: 1.5rem">Book Reports</h3>
                    </div>
                    <div class="card-body p-3 d-flex justify-content-center align-items-center">
                        <canvas id="bookReport"></canvas>
                    </div>
                </div>

            </div>

            <div class="col col-12 col-lg-7">
                <div class="card" style="min-height: 48.7%; max-height: 48.7%;">
                    <div class="card-header" style="border-bottom: 1px solid rgb(219, 217, 217)">
                        <h5 class="m-0" style="font-size: 1.5rem">Borrower Reports</h5>
                        <button class="btn button-2 ps-4 pe-4" onclick="printTopBorrowersTable()">Print</button>
                    </div>

                    <!-- Leaderboard Style Report -->
                    <div class="card-body p-3">
                        <h5 class="mb-4">Top 10 Borrowers</h5>
                        
                        <div style="max-height: 300px; overflow-y: auto;" id="topBorrowersTable">
                            <table class="table table-striped"  style="table-layout: fixed;">
                                <thead style="position: sticky; top: 0; background-color: #fff; z-index: 1;">
                                    <tr>
                                        <th scope="col">Rank</th>
                                        <th scope="col">Library Card No.</th>
                                        <th scope="col">Member Name</th>
                                        <th scope="col">Books Borrowed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topBorrowers as $index => $borrower)
                                        <tr>
                                            <td class="text-capitalize">{{ sprintf('%02d', $index + 1) }}</td>
                                            <td class="text-capitalize">{{ $borrower->library_card_no }}</td>
                                            <td class="text-capitalize">{{ $borrower->name }}</td>
                                            <td class="text-capitalize">{{ $borrower->total_books_borrowed }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card" style="min-height: 48.7%; max-height: 48.7%;">
                    <div class="card-header" style="border-bottom: 1px solid rgb(219, 217, 217)">
                        <h3 class="m-0" style="font-size: 1.5rem">Book Borrowing Reports</h3>
                        <button class="btn button-2 ps-4 pe-4" onclick="printTopBooksTable()">Print</button>
                    </div>

                    <!-- Leaderboard Style Report for Books -->
                    <div class="card-body p-3">
                        <h5 class="mb-4">Top 10 Most Borrowed Books</h5>
                        <div style="max-height: 300px; overflow-y: auto;" id="topBorrowedTable">
                            <table class="table table-striped" id="topBooks" style="table-layout: fixed;">
                                <thead style="position: sticky; top: 0; background-color: #fff; z-index: 1;">
                                    <tr>
                                        <th scope="col">Rank</th>
                                        <th scope="col">Accession No.</th>
                                        <th scope="col">Book Title</th>
                                        <th scope="col">Borrowed Times</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topBookBorroweds as $index => $topBookBorrowed)
                                        <tr>
                                            <td class="text-capitalize">{{ sprintf('%02d', $index + 1) }}</td>
                                            <td class="text-capitalize">{{ $topBookBorrowed->accession_no }}</td>
                                            <td class="text-capitalize">{{ $topBookBorrowed->title }}</td>
                                            <td class="text-capitalize">{{ $topBookBorrowed->borrowed_times }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</x-admin-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Pie Chart - Member Distribution by Group
        const pieLabels = @json($labels) && @json($labels).length ? @json($labels) : ['No Members'];
        const pieValues = @json($values) && @json($values).length ? @json($values) : [1];

        // Define the colors for each group based on your logic
        const getGroupColor = (group) => {
            switch (group) {
                case "College":
                    return 'blue';  // College - blue
                case "BASIC EDUCATION":
                case "Basic Education":
                    return '#28A745';  // Basic Education - green
                case "SENIOR HIGH SCHOOL":
                case "Senior High School":
                    return '#FFD93C';  // Senior High School - yellow
                case "FACULTY":
                case "Faculty":
                    return '#da4316';  // Faculty - red
                default:
                    return 'gray';  // Default color for any unrecognized group
            }
        };

        const pieBackgroundColors = pieLabels.map(group => getGroupColor(group));

        const memberReportCanvas = document.getElementById('memberReport');
        new Chart(memberReportCanvas, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieValues,
                    backgroundColor: pieBackgroundColors,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 1.5,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'Member Distribution by Group' }
                }
            }
        });


        // Doughnut Chart - Book Availability Status
        const doughnutLabels = @json($statusLabels);
        const statusCounts = @json($statusCounts);
        const statusPercentages = @json($statusPercentages);

        const doughnutChartCanvas = document.getElementById('bookReport');
        new Chart(doughnutChartCanvas, {
            type: 'doughnut',
            data: {
                labels: doughnutLabels,
                datasets: [{
                    data: statusCounts,
                    backgroundColor: ['#FF0000', '#28A745'],
                    borderColor: ['#FF0000', '#28A745'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 1.5,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                const percentage = statusPercentages[tooltipItem.dataIndex];
                                return `${tooltipItem.label}: ${percentage}%`;
                            }
                        }
                    },
                    title: { display: true, text: 'Book Availability Status' }
                },
            }
        });
    });

    // Print Top Borrowers Table
    function printTopBorrowersTable() {
        // Kunin ang content ng table
        var content = document.getElementById('topBorrowersTable').innerHTML;

        // Kunin ang kasalukuyang petsa
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleDateString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // I-append ang footer na may kasalukuyang date
        var footer = `<div style="text-align: right; margin-top: 20px; font-size: 12px; color: #555;">Printed on: ${formattedDate}</div>`;

        // I-append ang title sa taas ng page
        var title = `<h2 style="text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; color: #333;">Top 10 Borrowers</h2>`;
        
        // Buksan ang bagong window para sa pag-print
        var printWindow = window.open('', '', 'height=600,width=800');

        // I-set up ang HTML structure sa print window
        printWindow.document.write('<html><head><title>Print Borrower Table</title>');
        printWindow.document.write('<style>');
        // Optional: Magdagdag ng CSS sa print layout ng table
        printWindow.document.write('body { font-family: Arial, sans-serif; font-size: 12px; margin: 0; padding: 20px; }');
        printWindow.document.write('h2 { font-size: 18px; font-weight: bold; color: #333; }');
        printWindow.document.write('table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }');
        printWindow.document.write('table th, table td { padding: 8px; border: 1px solid #ddd; text-align: left; }');
        printWindow.document.write('table th { background-color: #f4f4f4; font-weight: bold; }');
        printWindow.document.write('div { margin-top: 20px; font-size: 12px; color: #555; }');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(title); // Isama ang title ng report
        printWindow.document.write(content); // Isama ang table content
        printWindow.document.write(footer); // Idagdag ang footer na may date
        printWindow.document.write('</body></html>');

        // Maghintay na matapos ang pag-render bago mag-print
        printWindow.document.close(); 
        printWindow.print(); // Mag-trigger ng print dialog
    }


    // Print Top 10 Borrowed Books
    function printTopBooksTable() {
        // Kunin ang content ng table
        var content = document.getElementById('topBorrowedTable').innerHTML;

        // Kunin ang kasalukuyang petsa
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleDateString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // I-append ang footer na may kasalukuyang date
        var footer = `<div style="text-align: right; margin-top: 20px; font-size: 12px; color: #555;">Printed on: ${formattedDate}</div>`;

        // I-append ang title sa taas ng page
        var title = `<h2 style="text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; color: #333;">Top 10 Most Borrowed Books</h2>`;
        
        // Buksan ang bagong window para sa pag-print
        var printWindow = window.open('', '', 'height=600,width=800');

        // I-set up ang HTML structure sa print window
        printWindow.document.write('<html><head><title>Print Borrowed Books Table</title>');
        printWindow.document.write('<style>');
        // Optional: Magdagdag ng CSS sa print layout ng table
        printWindow.document.write('body { font-family: Arial, sans-serif; font-size: 12px; margin: 0; padding: 20px; }');
        printWindow.document.write('h2 { font-size: 18px; font-weight: bold; color: #333; }');
        printWindow.document.write('table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }');
        printWindow.document.write('table th, table td { padding: 8px; border: 1px solid #ddd; text-align: left; }');
        printWindow.document.write('table th { background-color: #f4f4f4; font-weight: bold; }');
        printWindow.document.write('div { margin-top: 20px; font-size: 12px; color: #555; }');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(title); // Isama ang title ng report
        printWindow.document.write(content); // Isama ang table content
        printWindow.document.write(footer); // Idagdag ang footer na may date
        printWindow.document.write('</body></html>');

        // Maghintay na matapos ang pag-render bago mag-print
        printWindow.document.close(); 
        printWindow.print(); // Mag-trigger ng print dialog
    }


</script>