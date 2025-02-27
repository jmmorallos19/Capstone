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

class CheckBorrowDueDate implements ShouldQueue
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
    
    public function handle()
    {
        // Get all books with status 'Currently Borrowed' and a return date that has passed
        $borrowedBooks = MemberBook::with('member', 'book')
            ->where('status', 'Approaching Due Date')
            ->where('due_date', '<', Carbon::now()->timezone('Asia/Manila'))
            ->get();
        
        // Loop through each book to check and update overdue status and fines
        foreach ($borrowedBooks as $borrowedBook) {
            $dueDate = Carbon::parse($borrowedBook->due_date)->timezone('Asia/Manila');
            $currentDate = Carbon::now()->timezone('Asia/Manila');

            // Add 1 day to the current date
            $dueDate = $dueDate->addDay(); 

            // Use diffInRealDays() instead of diffInDays()
            $overdueDays = $currentDate->diffInDays($dueDate, false); // Using false to allow negative values if the due date is later than now

            // Debugging
            Log::info("Book ID {$borrowedBook->id} overdueDays: {$overdueDays} due date: {$dueDate} current date: {$currentDate}");

            // Round up overdueDays to avoid fractional values
            $overdueDays = ceil(abs($overdueDays)); // Ensure it's always a positive integer and round it up

            if ($overdueDays > 0) {
                // Status update logic
                if ($borrowedBook->status === 'Approaching Due Date') {
                    $borrowedBook->status = 'overdue';
                    $borrowedBook->save();
            
                    // Initialize fine calculation
                    $fine = 0;
            
                    // Calculate fines
                    if ($overdueDays == 1) {
                        // First day overdue
                        $fine = 15;  // Fine for first day

                        // Send email to member
                        Mail::to($borrowedBook->member->email)->queue(
                            new OverdueEmail($borrowedBook)
                        );

                        // Update member's fines
                        $borrowedBook->member->total_fines += $fine;
                        $borrowedBook->member->save();

                        // Update member book's fines
                        $borrowedBook->fines += $fine;
                        $borrowedBook->overdue_days += $overdueDays;
                        $borrowedBook->save();
                        
                    } else {
                        // First day is ₱15, and the following days are ₱10 per day
                        $fine = 15 + ($overdueDays - 1) * 10;

                        Mail::to($borrowedBook->member->email)->queue(
                            new OverdueEmail($borrowedBook)
                        );

                        // Update member's fines
                        $borrowedBook->member->total_fines += $fine;
                        $borrowedBook->member->save();

                        // Update member book's fines
                        $borrowedBook->fines += $fine;
                        $borrowedBook->overdue_days += $overdueDays;
                        $borrowedBook->save();
                    }
            
                    
            
                    Log::info("Book ID {$borrowedBook->id} is overdue. Fine: ₱{$fine}. Status updated to overdue.");
                }

                
            } else {
                Log::info("Book ID {$borrowedBook->id} is not overdue yet. No fine calculation.");
            }
            
        }
    }
}
