<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG; // Import Barcode generator class
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\AuditLog;
use App\Models\Notification;
use Exception;
use Carbon\Carbon;

class BookController extends Controller
{
    public function addBook(Request $request)
    {
            // Validation logic
            $request->validate([
                'bookTitle' => 'required|string|max:255',
                'authorName' => 'required|string|max:255',
                'ISBN' => 'nullable|string|max:10',
                'ISBN13' => 'nullable|string|max:13',
                'call_number' => 'required|string|max:255',
                'edition' => 'required|string|max:255',
                'publisher' => 'required|string|max:255',
                'year' => 'required|integer|digits:4|gte:1000|lte:9999',
                'volume' => 'required|string|max:255',
                'pages' => 'required|integer|min:1',
                'subject' => 'required|string|max:255',
                'biblio' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'abstract' => 'required|string|max:255',
                'library_branch' => 'nullable|string',
                'barcode' => 'nullable|string|size:13|regex:/^\d+$/'
            ], [
                'ISBN.required' => 'The isbn field is required.',
                'ISBN13.required' => 'The isbn13 field is required.',
            ]);
    
            // Logic to generate the new accession number
            $lastBook = Book::orderBy('accession_no', 'desc')->first();
            $lastAccessionNo = $lastBook ? $lastBook->accession_no : '0000';
            $newAccessionNo = str_pad((intval($lastAccessionNo) + 1), 4, '0', STR_PAD_LEFT);
    
            // Barcode generation and saving
            $generator = new BarcodeGeneratorPNG();
            $barcodeImage = $generator->getBarcode($newAccessionNo, BarcodeGeneratorPNG::TYPE_CODE_128);
            $directory = public_path('assets/images/bookBarcode');
            $barcodePath = $directory . '/' . $newAccessionNo . '.jpeg';
    
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
    
            file_put_contents($barcodePath, $barcodeImage);
    
            // Save the book record
            $book = Book::create([
                'accession_no' => $request->accessionNo,
                'title' => $request->bookTitle,
                'author' => $request->authorName,
                'isbn' => $request->ISBN,
                'isbn13' => $request->ISBN13,
                'call_no' => $request->call_number,
                'edition' => $request->edition,
                'publisher' => $request->publisher,
                'publication_year' => $request->year,
                'volume' => $request->volume,
                'pages' => $request->pages,
                'subject' => $request->subject,
                'bibliography' => $request->biblio,
                'description' => $request->description,
                'abstract' => $request->abstract,
                'library_branch' => $request->library_branch,
                'barcode' => 'assets/images/bookBarcode/' . $newAccessionNo . '.jpeg',
            ]);


            // Get the authenticated user
            $user = Auth::user();


            // Create a Audit for add books
            AuditLog::create([
                'user_id' => $user->id,  // Assuming the user is logged in
                'action' => 'Create',  // The activity type is 'Create'
                'type' => 'Book',
                'book_id' => $book->id,      // Reference the ID of the newly created book
                'book_copy_id' => null,      // You can pass the book copy ID if needed
                'member_id' => null,         // Or the member ID if applicable (for adding a member action)
                'activity_description' => $user->firstname . ' ' . $user->lastname . ' has created a new book titled "' . $book->title . '".',
            ]);
            


            // Create a Notification
            Notification::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'book_copy_id' => null,
                'member_id' => null,
                'user_role' => $user->role,
                'type' => "Added a Book",
                'is_read' => false,
                'description' => $user->firstname.' '.$user->lastname.' has added the book titled "' . $book->title . '" to the system.'
            ]);            

            // Success message
            return back()->with('success', 'Your book was added successfully!');
    }


    public function updateBook(Request $request, Book $book){

        $request->validate([
            'bookTitleEdit' => 'required|string|max:255',
            'authorNameEdit' => 'required|string|max:255',
            'ISBNEdit' => 'nullable|string|max:10',
            'ISBN13Edit' => 'nullable|string|max:13',
            'call_numberEdit' => 'required|string|max:255',
            'editionEdit' => 'required|string|max:255',
            'publisherEdit' => 'required|string|max:255',
            'yearEdit' => 'required|integer|digits:4|gte:1000|lte:9999',
            'volumeEdit' => 'required|string|max:255',
            'pagesEdit' => 'required|integer|min:1',
            'subjectEdit' => 'required|string|max:255',
            'biblioEdit' => 'required|string|max:255',
            'descriptionEdit' => 'required|string|max:255',
            'abstractEdit' => 'required|string|max:255',
            'library_branchEdit' => 'nullable|string',
        ], [
            'yearEdit.integer' => 'The year field must be a number.',
            'pagesEdit.integer' => 'The pages field must be a number.'
        ]);

        //Update Book
        $book->update([
            'title' => $request->bookTitleEdit,
            'author' => $request->authorNameEdit,
            'isbn' => $request->ISBNEdit,
            'isbn13' => $request->ISBN13Edit,
            'call_no' => $request->call_numberEdit,
            'edition' => $request->editionEdit,
            'publisher' => $request->publisherEdit,
            'publication_year' => $request->yearEdit,
            'volume' => $request->volumeEdit,
            'pages' => $request->pagesEdit,
            'subject' => $request->subjectEdit,
            'bibliography' => $request->biblioEdit,
            'description' => $request->descriptionEdit,
            'abstract' => $request->abstractEdit,
            'library_branch' => $request->library_branchEdit,
        ]);


        //Update Book Copy Also
        $bookCopy = BookCopy::where('book_id', $book->id);

        $bookCopy->update([
            'title' => $request->bookTitleEdit,
            'author' => $request->authorNameEdit,
            'isbn' => $request->ISBNEdit,
            'isbn13' => $request->ISBN13Edit,
            'call_no' => $request->call_numberEdit,
            'edition' => $request->editionEdit,
            'publisher' => $request->publisherEdit,
            'publication_year' => $request->yearEdit,
            'volume' => $request->volumeEdit,
            'pages' => $request->pagesEdit,
            'subject' => $request->subjectEdit,
            'bibliography' => $request->biblioEdit,
            'description' => $request->descriptionEdit,
            'abstract' => $request->abstractEdit,
            'library_branch' => $request->library_branchEdit,
        ]);
        

        // Get the authenticated user
        $user = Auth::user();   //Get the authenticated user


        // Create an audit log for updating a book
        AuditLog::create([
            'user_id' => $user->id,  // Assuming the user is logged in
            'action' => 'Update',  // The activity type is 'update'
            'type' => 'Book',
            'book_id' => $book->id,      // Reference the ID of the updated book
            'book_copy_id' => null,      // You can pass the book copy ID if needed
            'member_id' => null,         // Or the member ID if applicable (for adding a member action)
            'activity_description' => $user->firstname . ' ' . $user->lastname . ' has updated the book titled "' . $book->title . '".',
        ]);


        
        // Create a Notification
        Notification::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'book_copy_id' => null,
            'member_id' => null,
            'user_role' => $user->role,
            'type' => "Updated Book",
            'is_read' => false,
            'description' => $user->firstname.' '.$user->lastname.' has updated the details of the book titled "' . $book->title . '".'
        ]);        

        return back()->with(['success' => 'Book updated successfully!']);
    }



    
    public function archiveBook(Book $book){

        $currentDateTime = Carbon::now('Asia/Manila');

        $book->is_archive = true;
        $book->status = 'available';
        $book->archived_at = $currentDateTime;
        $book->save();
        

        // Get the authenticated user
        $user = Auth::user();   //Get the authenticated user


        // Create an audit log for archiving a book
        AuditLog::create([
            'user_id' => $user->id,  // Assuming the user is logged in
            'action' => 'Archive',  // The activity type is 'archive'
            'type' => 'Book',
            'book_id' => $book->id,      // Reference the ID of the archived book
            'book_copy_id' => null,      // You can pass the book copy ID if needed
            'member_id' => null,         // Or the member ID if applicable (for adding a member action)
            'activity_description' => $user->firstname . ' ' . $user->lastname . ' has archived the book titled "' . $book->title . '" with accession number ' . $book->accession_no . '.',
        ]);


        // Create a Notification
        Notification::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'book_copy_id' => null,
            'member_id' => null,
            'user_role' => $user->role,
            'type' => "Archived Book",
            'is_read' => false,
            'description' => $user->firstname.' '.$user->lastname.' has archived the book titled "' . $book->title . '".'
        ]);        

        return back()->with(['success' => 'Book arhived successful!']);
    }

    public function restoreBook(Book $book)
    {
        // Restore the book
        $book->is_archive = false;
        $book->status = 'available';
        $book->save();
    
        // Get the authenticated user
        $user = Auth::user();   // Get the authenticated user
    
        // Create an audit log for restoring a book
        AuditLog::create([
            'user_id' => $user->id,  // Assuming the user is logged in
            'action' => 'Restore',    // The activity type is 'Restore'
            'type' => 'Book',
            'book_id' => $book->id,      // Reference the ID of the restored book
            'book_copy_id' => null,      // You can pass the book copy ID if needed
            'member_id' => null,         // Or the member ID if applicable (for adding a member action)
            'activity_description' => $user->firstname . ' ' . $user->lastname . ' has restored the book titled "' . $book->title . '" with accession number ' . $book->accession_no . '.',
        ]);
    
        // Create a Notification
        Notification::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'book_copy_id' => null,
            'member_id' => null,
            'user_role' => $user->role,
            'type' => "Restored Book",  // Change the notification type to "Restored Book"
            'is_read' => false,
            'description' => $user->firstname . ' ' . $user->lastname . ' has restored the book titled "' . $book->title . '".',  // Update description for restoration
        ]);
    
        // Redirect back with success message
        return back()->with(['success' => 'Book restored successfully!']);
    }    
        
}
