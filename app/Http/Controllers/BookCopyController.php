<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG; 
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\AuditLog;
use App\Models\Notification;
use Exception;
use Illuminate\Support\Facades\Auth;

class BookCopyController extends Controller
{

    public function addBookCopy(Request $request, Book $book){

        try{
            $request->validate([
                'accessionNo',
                'bookTitleCopy' => 'required|string|max:255',
                'authorNameCopy' => 'required|string|max:255',
                'ISBNCopy' => 'required|nullable|string|max:10',
                'ISBN13Copy' => 'required|string|max:13',
                'call_numberCopy' => 'required|string|max:255',
                'editionCopy' => 'required|string|max:255',
                'publisherCopy' => 'required|string|max:255',
                'yearCopy' => 'required|integer|digits:4|gte:1000|lte:9999',
                'volumeCopy' => 'required|string|max:255',
                'pagesCopy' => 'required|integer|min:1',
                'subjectCopy' => 'required|string|max:255',
                'biblioCopy' => 'required|string|max:255',
                'descriptionCopy' => 'required|string|max:255',
                'abstractCopy' => 'required|string|max:255',
                'library_branchCopy' => 'nullable|string',
            ], [
                'yearCopy.integer' => 'The year field must be a number.',
                'pagesCopy.integer' => 'The pages field must be a number.'
            ]);
    
    
            $existingCopies = BookCopy::where('book_id', $book->id)->get();
    
            if ($existingCopies->isEmpty()) {
                // If there are no existing copies, set the first one as `c1`
                $copyNo = 'copy 1';
            } else {
                // If there are existing copies, find the highest `copy_no` and increment it
                // We are assuming `copy_no` follows a pattern like `c1`, `c2`, `c3`, etc.
                $maxCopyNo = $existingCopies->max(function($copy) {
                    // Get the numeric part of the `copy_no` (e.g., `c1` -> 1, `c2` -> 2)
                    return (int) filter_var($copy->copy_no, FILTER_SANITIZE_NUMBER_INT);
                });
            // Increment the number by 1 to get the next `copy_no`
            $nextCopyNo = 'copy ' . ($maxCopyNo + 1);
            $copyNo = $nextCopyNo;
            }
    
    
            // Barcode generation and saving
            $generator = new BarcodeGeneratorPNG();
            $barcodeImage = $generator->getBarcode($request->accessionNo, BarcodeGeneratorPNG::TYPE_CODE_128);
            $directory = public_path('assets/images/bookCopyBarcode');
            $barcodePath = $directory . '/' . $request->accessionNo . '.jpeg';
    
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
    
            file_put_contents($barcodePath, $barcodeImage);
    
            // For Book Copy Accession Number
            $accessionNo = $request->accessionNo;

            // Get the last record from the Book and BookCopy models
            $lastBook = Book::orderBy('accession_no', 'desc')->first();
            $lastBookCopy = BookCopy::orderBy('accession_no', 'desc')->first();
            
            // Default to a null value if no records are found
            $lastBookAccession = $lastBook ? (int) $lastBook->accession_no : null;
            $lastBookCopyAccession = $lastBookCopy ? (int) $lastBookCopy->accession_no : null;
            
            // Handle the case where both records exist
            if ($lastBookAccession !== null && $lastBookCopyAccession !== null) {
                if ($lastBookAccession >= $lastBookCopyAccession) {
                    $accessionNo = $request->accessionNo;
                } else {
                    $accessionNo = sprintf('%04d', $lastBookCopyAccession + 1);
                }
            } else {
                // Handle the case when no records exist or one of the records is missing
                $accessionNo = $request->accessionNo;
            }
    
            $bookCopy = BookCopy::create([
                'book_id' => $book->id,
                'copy_no' => $copyNo,
                'accession_no' => $accessionNo,
                'title' => $request->bookTitleCopy,
                'author' => $request->authorNameCopy,
                'isbn' => $request->ISBNCopy,
                'isbn13' => $request->ISBN13Copy,
                'call_no' => $request->call_numberCopy,
                'edition' => $request->editionCopy,
                'publisher' => $request->publisherCopy,
                'publication_year' => $request->yearCopy,
                'volume' => $request->volumeCopy,
                'pages' => $request->pagesCopy,
                'subject' => $request->subjectCopy,
                'bibliography' => $request->biblioCopy,
                'description' => $request->descriptionCopy,
                'abstract' => $request->abstractCopy,
                'library_branch' => $request->library_branchCopy,
                'barcode' => 'assets/images/bookCopyBarcode/' . $request->accessionNo . '.jpeg'
            ]);


            // Create a Audit for update books
            $user = Auth::user();   //Get the authenticated user


            // Create an audit log for adding a book copy
            AuditLog::create([
                'user_id' => $user->id,  // Assuming the user is logged in
                'action' => 'Create',  // The activity type is 'create'
                'type' => 'Book Copy',
                'book_id' => $book->id,      // Reference the ID of the newly created book
                'book_copy_id' => $bookCopy->id,      // Reference the ID of the new book copy
                'member_id' => null,         // Or the member ID if applicable (for adding a member action)
                'activity_description' => $user->firstname . ' ' . $user->lastname . ' has added a new copy of the book titled "' . $book->title . '".',
            ]);


            // Create a Notification
            Notification::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'book_copy_id' => $bookCopy->id,
                'member_id' => null,
                'user_role' => $user->role,
                'type' => "Added new book copy",
                'is_read' => false,
                'description' => $user->firstname.' '.$user->lastname.' has added a new copy of the book titled "' . $book->title . '" (Accession No: ' . $bookCopy->accession_no . ').'
            ]);            

            // Adding a total Copies in Book
            $allCopiesCount = BookCopy::where('book_id', $book->id)->count();

            Book::where('id', $book->id)->update([
                'total_copies' => $allCopiesCount
            ]);
        
            return back()->with(['success' => 'Book copy added successfully!']);
    
        } catch (Exception $e) {
            // Code to handle the exception
            return back()->with('error', $e->getMessage()) ;
        }
    
    }


    public function deleteBookCopy(Book $book, BookCopy $bookCopy)
    {
        //Ensure the book copy exists before attempting to delete
        $bookCopy = $book->bookCopies()->where('id', $bookCopy->id)->first();

        if ($bookCopy) {

            $user = Auth::user();   //Get the authenticated user

            // Delete the book copy
            $bookCopy->delete();

            // Create Audit
            AuditLog::create([
                'user_id' => $user->id,  // Assuming the user is logged in
                'action' => 'Delete',     // The activity type is 'delete'
                'type' => 'Book Copy',
                'book_id' => $book->id,      // Reference the ID of the book
                'book_copy_id' => $bookCopy->id,  // Reference the ID of the deleted book copy
                'member_id' => null,         // Or the member ID if applicable
                'activity_description' => $user->firstname . ' ' . $user->lastname . ' has deleted a copy of the book titled "' . $book->title . '" (Accession No: ' . $bookCopy->accession_no . ').',
            ]);

            // Create Notification
            Notification::create([
                'user_id' => $user->id, // Assuming the user is logged in
                'book_id' => $book->id,
                'book_copy_id' => $bookCopy->id,
                'member_id' => null, // Assuming no member is related to this action
                'user_role' => $user->role, // Assuming the user's role is needed
                'type' => "Deleted Book Copy",
                'is_read' => false,
                'description' =>  $user->firstname.' '. $user->lastname.' has deleted a copy of the book titled "' . $book->title . '" (Accession No: ' . $bookCopy->accession_no . ').'
            ]);

            // Return with success message
            return back()->with(['success' => 'Book copy deleted successfully.']);
        } else {
            // Handle case if the book copy is not found
            return back()->with(['error' => 'Book copy not found.']);
        }
    }


    public function showBookCopy(Book $book, BookCopy $bookCopy){

        $bookCopy = $book->bookCopies()->where('id', $bookCopy->id)->first();

        return view('admin.bookCopy')->with(['bookCopy' => $bookCopy]);
    }


    public function updateBookCopy(Request $request, BookCopy $bookCopy){

        $request->validate([
            'bookTitleCopyEdit' => 'required|string|max:255',
            'authorNameCopyEdit' => 'required|string|max:255',
            'ISBNCopyEdit' => 'required|nullable|string|max:10',
            'ISBN13CopyEdit' => 'required|string|max:13',
            'call_numberCopyEdit' => 'required|string|max:255',
            'editionCopyEdit' => 'required|string|max:255',
            'publisherCopyEdit' => 'required|string|max:255',
            'yearCopyEdit' => 'required|integer|digits:4|gte:1000|lte:9999',
            'volumeCopyEdit' => 'required|string|max:255',
            'pagesCopyEdit' => 'required|integer|min:1',
            'subjectCopyEdit' => 'required|string|max:255',
            'biblioCopyEdit' => 'required|string|max:255',
            'descriptionCopyEdit' => 'required|string|max:255',
            'abstractCopyEdit' => 'required|string|max:255',
            'library_branchCopyEdit' => 'nullable|string',
        ], [
            'yearCopyEdit.integer' => 'The year field must be a number.',
            'pagesCopyEdit.integer' => 'The pages field must be a number.',
            'ISBNCopyEdit.max' => 'The isbn copy edit field must not be greater than 10 characters.',
            'ISBN13CopyEdit.max' => 'The isbn copy edit field must not be greater than 10 characters.'
        ]);

        $bookCopy->update([
            'title' => $request->bookTitleCopyEdit,
            'author' => $request->authorNameCopyEdit,
            'isbn' => $request->ISBNCopyEdit,
            'isbn13' => $request->ISBN13CopyEdit,
            'call_no' => $request->call_numberCopyEdit,
            'edition' => $request->editionCopyEdit,
            'publisher' => $request->publisherCopyEdit,
            'publication_year' => $request->yearCopyEdit,
            'volume' => $request->volumeCopyEdit,
            'pages' => $request->pagesCopyEdit,
            'subject' => $request->subjectCopyEdit,
            'bibliography' => $request->biblioCopyEdit,
            'description' => $request->descriptionCopyEdit,
            'abstract' => $request->abstractCopyEdit,
            'library_branch' => $request->library_branchCopyEdit,
        ]);


        // Get the authenticated user
        $user = Auth::user();   //Get the authenticated user

        // Create a Audit for update books
        AuditLog::create([
            'user_id' => $user->id,  // Assuming the user is logged in
            'action' => 'Update',     // The activity type is 'Update'
            'type' => 'Book Copy',    // The type is 'Book Copy'
            'book_id' => null,        // Reference the ID of the book (if applicable)
            'book_copy_id' => $bookCopy->id,  // Pass the book copy ID
            'member_id' => null,      // Or the member ID if applicable
            'activity_description' => 'A book copy has been updated: ' . $bookCopy->title,  // Simplified description
        ]);        


        // Create a Notification
        Notification::create([
            'user_id' => $user->id,
            'book_id' => null,
            'book_copy_id' => $bookCopy->id,
            'member_id' => null,
            'user_role' => $user->role,
            'type' => "Updated Book Copy",
            'is_read' => false,
            'description' => $user->firstname.' '.$user->lastname.' has updated the details of the book copy (Accession No: ' . $bookCopy->accession_no . ') for the book titled "' . $bookCopy->book->title . '".'
        ]);
        

        return back()->with(['success' => 'Book copy updated successful!']);
    }

}
