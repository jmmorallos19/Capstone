<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Member;
use App\Models\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   // Mag-pass ng user data sa lahat ng views
        View::composer('*', function ($view) {
            
            // Get the last Book record and extract the last book accession
            $lastBook = Book::orderBy('accession_no', 'desc')->first();
            $lastBookCopy = BookCopy::orderBy('accession_no', 'desc')->first();

            // Get the last accession numbers for Book and BookCopy
            $lastBookAccession = $lastBook ? (int) $lastBook->accession_no : 0;  // Default to 0 if no records exist
            $lastBookCopyAccession = $lastBookCopy ? (int) $lastBookCopy->accession_no : 0;  // Default to 0 if no records exist

            // Determine the next accession number
            if ($lastBookAccession >= $lastBookCopyAccession) {
                // If the last Book accession is greater or equal, increment Book's accession number
                $nextBookAccession = $lastBookAccession + 1;
            } else {
                // If the last BookCopy accession is greater, increment BookCopy's accession number
                $nextBookAccession = $lastBookCopyAccession + 1;
            }

            // Format the next accession number to be 4 digits, padding with leading zeros if needed
            $nextBookAccession = str_pad($nextBookAccession, 4, '0', STR_PAD_LEFT);
                        

            
            // Get the last Member record and extract the last Library number
            $lastMember = Member::orderBy('library_card_no', 'desc')->first();
            if ($lastMember && $lastMember->library_card_no !== null) {
                $lastNumberpart = substr($lastMember->library_card_no, 5);
                $nextMemberLibraryNo = intval($lastNumberpart) + 1;
            } else {
                $nextMemberLibraryNo = 1;  // Starting with 1 if no records exist
            }

            $nextMemberLibraryNo = str_pad((intval($nextMemberLibraryNo)), 4, '0', STR_PAD_LEFT);

            $staticYear = "2025-";

            $nextMemberLibraryNo = $staticYear . $nextMemberLibraryNo;



            
            $staffNotificationsCount = Notification::where('user_role', 'admin')->count();
            $adminNotificationsCount = Notification::where('user_role', 'staff')->count();

          
            
            $view->with(['user' => Auth::user(), 
                         'nextBookAccession' => $nextBookAccession, 
                         'nextMemberLibraryNo' => $nextMemberLibraryNo,
                         'adminNotificationsCount' => $adminNotificationsCount,
                         'staffNotificationsCount' => $staffNotificationsCount,]);  
                        
        });
    }
}
