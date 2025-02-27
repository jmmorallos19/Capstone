<div class="header container-fluid pe-4 ps-4">
    <!-- Title Section -->
    <div class="title col col-lg-6 col-md-2 col-sm-1 col-2 mr-xl-0 p-0">
        <div class="d-flex" style="gap: .5rem;">
            <button class="toggler-btn d-block d-xl-none " type="button">
                <i class="bi bi-list"></i>
            </button>
            <h1 class="mb-0 fs-xl-3 d-none d-lg-block text-uppercase ps-0 ps-lg-1" style="font-weight: 900; color: #193c71;">WELCOME {{ $user->role }}!</h1>
        </div>

        <p class="mb-0 d-none ps-2 d-xl-block" id="dateTime">
            <?php
            // Set the default timezone
            date_default_timezone_set('Asia/Manila');

            // Get the current date, day, and time
            $currentDate = date('m/d/Y'); // m/d/Y format
            $currentDay = date('l');
            $currentTime = date('h:i:s A'); // 12-hour format with AM/PM

            // Print the date, day, and time in the desired format
            echo "<script>
                        document.getElementById('dateTime').innerHTML = '$currentDate | $currentDay, $currentTime';
                    </script>";
            ?>
        </p>
    </div>

</div>