<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\MemberBook;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Mail\OverdueEmail;
use Illuminate\Support\Facades\Mail;

class AddFinesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $overdueBooks = MemberBook::with('member', 'book')->where('status', 'overdue')->get();

        foreach ($overdueBooks as $overdueBook) {
            $dueDate = Carbon::parse($overdueBook->due_date)->timezone('Asia/Manila');
            $currentDate = Carbon::now()->timezone('Asia/Manila');

            // Add 1 day to the current date
            $dueDate = $dueDate->addDay(); 

            // Use diffInRealDays() instead of diffInDays()
            $overdueDays = $currentDate->diffInDays($dueDate, false); // Using false to allow negative values if the due date is later than now

            // Debugging
            Log::info("Book ID {$overdueBook->id} overdueDays: {$overdueDays} due date: {$dueDate} current date: {$currentDate}");

            // Round up overdueDays to avoid fractional values
            $overdueDays = ceil(abs($overdueDays)); // Ensure it's always a positive integer and round it up
            
            if($overdueBook->status === 'overdue') {
                
                if ($overdueDays > 1){

                    $overdueBook->fines = $overdueBook->fines + 10;
                    $overdueBook->overdue_days = $overdueBook->overdue_days + 1;
                    $overdueBook->save();

                    // Update member's fines
                    $overdueBook->member->total_fines += 10;
                    $overdueBook->member->save();

                    Log::info("Fines added to Book ID {$overdueBook->id} for Member ID {$overdueBook->member->id} member fines: {$overdueBook->member->total_fines}");
                }
            }
            

        }

        Log::info('Fines added successfully');
    }
}
