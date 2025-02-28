<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\CheckBorrowDueDate;
use App\Jobs\BookWarningJob;
use App\Jobs\AddFinesJob;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Schedule::job(new CheckBorrowDueDate)->daily()->timezone('Asia/Manila');
// Schedule::job(new BookWarningJob)->daily()->timezone('Asia/Manila');
// Schedule::job(new AddFinesJob)->daily()->timezone('Asia/Manila');

// Correct way to schedule the job to run every minute
// For Testing Only
Schedule::job(new CheckBorrowDueDate)->everySecond()->timezone('Asia/Manila');
Schedule::job(new BookWarningJob)->everySecond()->timezone('Asia/Manila');
Schedule::job(new AddFinesJob)->everySecond()->timezone('Asia/Manila');
