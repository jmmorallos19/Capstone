<?php

namespace App\Jobs;

use App\Mail\BookWarningEmail; // Assuming this is the Mailable you will use
use App\Models\MemberBook;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class BookWarningJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        // No constructor data needed for this job
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Get all Currently Borrowed books with their member and book details
        $borrowedBooks = MemberBook::with('member', 'book')
            ->where('status', 'Currently Borrowed')
            ->get();
    
        // Loop through each borrowed book
        foreach ($borrowedBooks as $borrowedBook) {
            // Make sure due_date is a Carbon instance
            $dueDate = Carbon::parse($borrowedBook->due_date)->timezone('Asia/Manila'); // Convert to Carbon instance
            
            // Check if the due date is tomorrow (1 day remaining)
            if ($dueDate->isTomorrow() || $borrowedBook->status === 'Currently Borrowed'){
                $borrowedBook->status = 'Approaching Due Date';
                $borrowedBook->save();

                // Send the warning email to the member
                Mail::to($borrowedBook->member->email)->queue(
                    new BookWarningEmail($borrowedBook) // Assuming you already have a BookWarning Mailable
                );
            }
        }
    }
}
