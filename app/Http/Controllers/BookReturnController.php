<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Member;
use App\Models\MemberBook;
use App\Models\AuditLog;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\ReturnEmail;
use Illuminate\Container\Attributes\Log;

class BookReturnController extends Controller
{
    public function returnBook(Request $request)
    {
        $request->validate([
            'returnAccession' => 'required',
            'returnLibraryCard' => 'required',
            'emailReturn',
            'returnMemberId'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Get the date today
        $today = Carbon::now('Asia/Manila');

        // Get the book with the same acession of user input
        $book = MemberBook::with('member', 'book')->where('book_accession', $request->returnAccession)->first();

        // Get the book copy with the same acession of user input
        $bookCopy = MemberBook::with('member', 'book')->where('book_copy_accession', $request->returnAccession)->first();;

        // Get the member with the same id of user input
        $borrower = MemberBook::where('member_id', $request->returnMemberId)->first();

        $memberlist = Member::where('id', $request->returnMemberId)->first();

        if (!$borrower && !$memberlist) {

            return back()->with(['error' => 'Member does not exist!']);
        }

        // Check if either the book or book copy exists
        if ($book) {

            if ($book->book->status === 'available') {

                return back()->with(['error' => 'Book is still available!']);
            } else {

                // Update Member Books
                $book->update([
                    'status' => 'returned',
                    'returned_at' => $today
                ]);

                // Update Book
                $book->book->update([
                    'status' => 'available'
                ]);

                // Update Member Fines
                $book->member->total_fines = $book->member->total_fines - $book->fines;
                $book->member->save();
                
                $member = Member::where('id', $book->member_id)->first();
                $current_books = $member->currently_borrowed_books;

                // Check if the current book is equal to 0
                if ($current_books >= 0) {

                    $current_books = $current_books - 1;
                } else {

                    $current_books = 0;
                }

                // Update member current book total
                $member->update([

                    'currently_borrowed_books' => $current_books
                ]);

                // Created an audit log for borrowing Book
                AuditLog::create([
                    'user_id' => $user->id,  // The ID of the user performing the action
                    'action' => 'Return',     // Action type is 'Return'
                    'type' => 'Book',         // Type of entity (Book in this case)
                    'book_id' => $book->id,   // The ID of the book being returned
                    'book_copy_id' => null,   // Assuming no book copy ID is involved
                    'member_id' => $request->returnMemberId,  // The member ID of the person returning the book
                    'activity_description' => $book->member->name . ' returned the book to ' . $user->firstname . ' ' . $user->lastname,  // Activity description without the book_copy_id
                ]);

                // Created a notification for borrowing Book
                Notification::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'book_copy_id' => null,
                    'member_id' => $request->returnMemberId,
                    'user_role' => $user->role,
                    'type' => 'Returned Book',
                    'is_read' => false,
                    'description' => $book->member->name . ' has returned the book titled "' . $book->book->title . '" (Accession No: ' . $book->book->accession_no . ') to ' . $user->firstname . ' ' . $user->lastname . '.'
                ]);                


                //Send a return email 
                Mail::to($request->emailReturn)->queue(
                    new ReturnEmail($borrower)
                );

                // If not found, handle the return
                return back()->with(['success' => 'Book returned successfully']);
                
            }
        } elseif ($bookCopy) {

            if ($bookCopy->bookCopy->status === 'available') {

                return back()->with(['error' => 'Book is still available!']);
            } else {
                // Update Member Books
                $bookCopy->update([
                    'status' => 'returned',
                    'returned_at' => $today
                ]);

                // Update Book Copy
                $bookCopy->bookCopy->update([
                    'status' => 'available'
                ]);

                // Update Member Fines
                $bookCopy->member->total_fines = $bookCopy->member->total_fines - $bookCopy->fines;
                $bookCopy->member->save();

                $member = Member::where('id', $bookCopy->member_id)->first();
                $current_books = $member->currently_borrowed_books;

                // Check if the current book is equal to 0
                if ($current_books >= 0) {

                    $current_books = $current_books - 1;

                } else {

                    $current_books = 0;
                }
                // Update member current book total
                $member->update([
                    'currently_borrowed_books' => $current_books
                ]);

                // Created an audit log for returning a book copy
                AuditLog::create([
                    'user_id' => $user->id,
                    'action' => 'Return',  // The action is 'return' as the book is being returned by the member
                    'type' => 'Book Copy',
                    'book_id' => null,
                    'book_copy_id' => $bookCopy->id,
                    'member_id' => $request->returnMemberId,
                    'activity_description' => $bookCopy->member->name . ' has returned the book copy titled "' . $bookCopy->bookCopy->title . '" to ' . $user->firstname . ' ' . $user->lastname . '.',
                ]);


                // Created a notification for returning Book Copy
                Notification::create([
                    'user_id' => $user->id,
                    'book_id' => null,  // Assuming book_id is not required here
                    'book_copy_id' => $bookCopy->id,
                    'book_copy_accession' => $request->returnAccession,
                    'member_id' => $request->returnMemberId,
                    'user_role' => $user->role,
                    'type' => 'Returned Book Copy',
                    'is_read' => false,
                    'description' => $bookCopy->member->name . ' has returned the book copy titled "' . $bookCopy->bookCopy->title . '" (Accession No: ' . $bookCopy->bookCopy->accession_no . ') to ' . $user->firstname . ' ' . $user->lastname . '.'
                ]);


                //Send a return email 
                Mail::to($request->emailReturn)->queue(
                    new ReturnEmail($borrower)
                );

                // If not found, handle the return
                return back()->with(['success' => 'Book returned successfully']);
            }
        } else {

            return back()->with(['error' => 'Book not Found']);
        }
    }
}
