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
use App\Mail\BorrowEmail;

class BookBorrowController extends Controller
{
    public function borrowBook(Request $request){

        $request->validate([
            'accession' => 'required',
            'bookId',
            'libraryCard' => 'required',
            'memberId',
            'end_borrow' => 'required',
            'emailValue',
            'memberGroupValue'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Get the date today
        $today = Carbon::now('Asia/Manila');

        // Get Book with the same accession no.
        $book = Book::where('accession_no', $request->accession)->first();

        // Get book copy with the same accession no.
        $bookCopy = BookCopy::with('book')->where('accession_no', $request->accession)->first();

        //Get member with the same library Card no.
        $member = Member::where('library_card_no', $request->libraryCard)->first();

        
        // If member not found or invalid library Card
        if(!$member){
            return back()->with(['error' => 'Member does not exist!']);
        }

        // Check if member reach the limit
        if($member->currently_borrowed_books == $member->total_books_allowed){
            
            return back()->with(['error' => 'Member has reached their borrow limit (3/3)!']);
        }

        //Book found in books table 
        if ($book) {

            // Check if the books is archived already
            if($book->is_archive == true){

                return back()->with(['error' => 'Book does not exist!']);

            }

            // Check if the book is already borrowed
            if($book->status === 'borrowed'){

                return back()->with(['error' => 'Book is already borrowed!']);

            }
            else{

                if($request->memberGroupValue === 'Faculty'){
                    $end_borrow = null;
                }else{
                    $end_borrow = $request->end_borrow;
                }

                $memberBook = MemberBook::create([
                    'member_id' => $request->memberId,
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'book_copy_id' => null,
                    'book_accession' => $request->accession,
                    'book_copy_accession' => null,
                    'status' => 'Currently Borrowed',
                    'borrowed_at' => $today,
                    'due_date' => $end_borrow
                ]);
    

                $current_books = $member->currently_borrowed_books;
                $current_books = $current_books + 1;

                $total_books_borrowed = $member->total_books_borrowed;
                $total_books_borrowed = $total_books_borrowed + 1;
    
                $member->update([
                    'currently_borrowed_books' => $current_books,
                    'total_books_borrowed' => $total_books_borrowed
                ]);

            
                // Update book status
                $book->update([
                    'status' => 'borrowed',
                    'borrowed_times' => $book->borrowed_times + 1
                ]);
    
                
                // Created an audit log for lending a book
                AuditLog::create([
                    'user_id' => $user->id,
                    'action' => 'Lend',
                    'type' => 'Book',
                    'book_id' => $book->id,
                    'book_copy_id' => null,
                    'member_id' => $request->memberId,
                    'activity_description' => $user->firstname . ' ' . $user->lastname . ' has lent the book titled "' . $book->title . '" with accession number ' . 
                                            $book->accession_no . ' to ' . $member->name . ', who holds a library card number ' . $member->library_card_no . '.'
                ]);

    
    
                // Created a notification for borrowing Book
                Notification::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'book_copy_id' => null,
                    'member_id' => $request->memberId,
                    'user_role' => $user->role,
                    'type' => 'Lent Book',
                    'is_read' => false,
                    'description' => $user->firstname.' '.$user->lastname.' has lent the book titled "' . $book->title . '" to ' . $member->name . '.'
                ]);
                
            }
            
        }

        //Book found in bookCopies table 
        elseif($bookCopy){

           if($bookCopy->status === 'borrowed'){

                return back()->with(['error' => 'Book is already borrowed!']);

           }else{

                if($request->memberGroupValue === 'Faculty'){
                    $end_borrow = null;
                }else{
                    $end_borrow = $request->end_borrow;
                }

                $memberBook = MemberBook::create([
                    'member_id' => $request->memberId,
                    'user_id' => $user->id,
                    'book_id' => null,
                    'book_copy_id' => $bookCopy->id,
                    'book_accession' => null,
                    'book_copy_accession' => $request->accession,
                    'status' => 'Currently Borrowed',
                    'borrowed_at' => $today,
                    'due_date' => $end_borrow
                ]);

                // Update member current book total
                $current_books = $member->currently_borrowed_books;
                $current_books = $current_books + 1;
    
                $member->update([
                    'currently_borrowed_books' => $current_books
                ]);

                // Update book copy status
                $bookCopy->update([
                    'status' => 'borrowed'
                ]);

                // Update Book Borrowed Times
                $bookCopy->book->update([
                    'borrowed_times' => $bookCopy->book->borrowed_times + 1
                ]);

                // Created an audit log for lending a book
                AuditLog::create([
                    'user_id' => $user->id,
                    'action' => 'Lend',
                    'type' => 'Book Copy',
                    'book_id' =>  null,
                    'book_copy_id' =>$bookCopy->id,
                    'member_id' => $request->memberId,
                    'activity_description' => $user->firstname . ' ' . $user->lastname . ' has lent the book copy titled "' . $bookCopy->title . '" with accession number ' . 
                                            $bookCopy->accession_no . ' to ' . $member->name . ', who holds a library card number ' . $member->library_card_no . '.'
                ]);


                // Created a notification for borrowing Book
                Notification::create([
                    'user_id' => $user->id,
                    'book_id' => null,
                    'book_copy_id' => $bookCopy->id,
                    'book_copy_accession' => $request->accession,
                    'member_id' => $request->memberId,
                    'user_role' => $user->role,
                    'type' => 'Lent Book Copy',
                    'is_read' => false,
                    'description' => $user->firstname.' '.$user->lastname.' has lent the book copy titled "' . $bookCopy->book->title . '" (Accession No: ' . $bookCopy->accession_no . ') to ' . $member->name . '.'
                ]);                
                
           }


        }else{

            return back()->with(['error' => 'Book does not exist!']);
        }

        // Send email to member
        Mail::to($request->emailValue)->queue(
            new BorrowEmail($memberBook)
        );


        return back()->with(['success' => 'Book borrowed successfully']);
    }
}
