<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;
use App\Models\User;
use App\Models\AuditLog;
use App\Models\BookCopy;
use App\Models\MemberBook;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function showLogin()
    {

        return view('login')->with(['success' => 'Login successfully!']);
    }

    public function showDashboard()
    {
        // Get all Members And Books Data
        $books = Book::where('is_archive', false)->orderBy('created_at', 'desc')->get();
        $members = Member::all();

        // Get all Members total
        $allMemberCount = Member::all()->count();
        $allMemberCount = sprintf('%02d', $allMemberCount);

        // Get all Members total
        $allBookCount = Book::all()->count();
        $allBookCount = sprintf('%02d', $allBookCount);

        // Get all Borrowed Boks
        $borrowedBookCount = Book::where('status', 'borrowed')->get()->count();
        $borrowedBookCount = sprintf('%02d', $borrowedBookCount);
        
        // Get all books where status is available
        $allAvailableBook = Book::where('status', 'available')->count();
        $allAvailableBook = sprintf('%02d', $allAvailableBook);

        $returnedMembers = MemberBook::where('status', 'returned')->get();
        $borrowedMembers = MemberBook::where('status', '!=', 'returned')->get();

        return view('admin.dashboard', [
            'books' => $books,
            'members' => $members,
            'allMemberCount' => $allMemberCount,
            'allBookCount' => $allBookCount,
            'allAvailableBook' => $allAvailableBook,
            'borrowedBookCount' => $borrowedBookCount,
            'returnedMembers' =>  $returnedMembers,
            'borrowedMembers' => $borrowedMembers
        ]);
    }

    public function showBook()
    {

        $books = Book::where('is_archive', false)->with('bookCopies')->get();

        return view('admin.books', ['books' => $books]);
    }

    public function showMember()
    {

        $members = Member::all();

        return view('admin.members', ['members' => $members]);
    }

    public function showAuditLog()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $auditLogs = AuditLog::with(['book', 'user', 'bookCopy', 'member'])->where('user_id', $user_id)->get();

        return view('admin.audit_log')->with(['auditLogs' => $auditLogs]);
    }

    public function showProfile()
    {

        $staff = User::where('role', 'staff')->first();
        $admin = User::where('role', 'admin')->first();

        return view('admin.profile', ['staff' => $staff, 'admin' => $admin]);
    }

    public function profileEdit(Request $request)
    {

        $user_id = Auth::user()->id;

        $user_image = Auth::user()->image_url;

        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'school_email' => 'required|email',
            'personal_email' => 'required|email',
            'contact_number' => 'required',
            'user-profile' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048'
        ]);


        $imageUrl = null;

        if ($request->hasFile('user-profile')) {
            $imageFile = $request->file('user-profile');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/images/userProfile/'), $imageName);
            $imageUrl = 'assets/images/userProfile/' . $imageName;
        }

        // Update the user data
        User::where('id', $user_id)->update([
            'firstname' => $request->first_name,
            'middlename' => $request->middle_name,
            'lastname' => $request->last_name,
            'phone' => $request->contact_number,
            'school_email' => $request->school_email,
            'email' => $request->personal_email,
            'image_url' => $imageUrl ? $imageUrl : $user_image
        ]);


        // Make a audit log when user is update its profile
        $user = Auth::user();

        AuditLog::create([
            'user_id' => $user->id,
            'action' => 'Update',
            'type' => 'User Profile',
            'book_id' => null,
            'book_copy_id' => null,
            'member_id' => null,
            'activity_description' => 'The user updated their profile information.',
        ]);

        // Redirect back with a success message
        return back()->with('success', 'Profile updated successfully!');
    }


    public function showBookEdit(Book $book)
    {

        $bookCopies = BookCopy::where('book_id', $book->id)->orderByRaw("CASE WHEN status = 'borrowed' THEN 0 ELSE 1 END")->get();
        $book->load('bookCopies');

        return view('admin.book_edit', [
            'book' => $book,
            'bookCopies' =>  $bookCopies
        ]);
    }

    public function showMemberEdit(Member $member)
    {

        $memberBorrowedBooks = MemberBook::with('member', 'book', 'bookCopy')
                            ->where('member_id', $member->id)
                            ->where('status', '!=', 'returned')
                            ->latest()
                            ->get();

        $member->load('memberBooks');

        return view('admin.member_edit', ['member' => $member,
                                                      'memberBorrowedBooks' => $memberBorrowedBooks]);
    }

    public function showArchive()
    {
        $archivedBooks = Book::where('is_archive', true )->latest()->get();

        return view('admin.archive')->with(['archivedBooks' => $archivedBooks]);
    }

    public function showManageAccount()
    {
        $staffLists = User::where('role', 'staff')->get();

        return view('admin.manage_account')->with(['staffLists' => $staffLists]);
    }

    public function showNotification()
    {

        // Get notifications
        $staffNotifications = Notification::with('user', 'book', 'member' , 'bookCopy')->where('user_role', 'admin')->latest()->Paginate(10);
        $adminNotifications = Notification::with('user', 'book', 'member' , 'bookCopy')->where('user_role', 'staff')->latest()->paginate(10);

        // dd($adminNotifications);

        $staffNotificationsCount = Notification::where('user_role', 'admin')->count();
        $adminNotificationsCount = Notification::where('user_role', 'staff')->count();
 
        return view('admin.notification')->with(['staffNotifications' => $staffNotifications,
                                                            'adminNotifications' => $adminNotifications,
                                                            'adminNotificationsCount' => $adminNotificationsCount,
                                                            'staffNotificationsCount' => $staffNotificationsCount]);
    }

    public function showArchiveEdit(Book $archive){

        return view('admin.archiveEdit', ['archive' => $archive]);
    }


    public function showReport() {
        // Member Report
        $memberGroups = Member::select('member_group', DB::raw('count(*) as count'))
            ->groupBy('member_group')
            ->get();
    
        // Pag-process ng data para ipasa sa frontend
        $labels = $memberGroups->pluck('member_group')->toArray();
        $values = $memberGroups->pluck('count')->toArray();
    

        // Book Report
        $bookStatusCounts = DB::table('books')
        ->select('status', DB::raw('count(*) as count'))
        ->groupBy('status')  // Group by status (available, borrowed, etc.)
        ->whereIn('status', ['available', 'borrowed'])  // Limit to available and borrowed statuses
        ->get();

        // Pag-process ng data para ipasa sa frontend
        $statusLabels = $bookStatusCounts->pluck('status')->toArray();  // Labels (status: available, borrowed)
        $statusCounts = $bookStatusCounts->pluck('count')->toArray();   // Values (count ng available at borrowed books)

        // Ipakita ang percentage para sa bawat status
        $totalBooks = array_sum($statusCounts);  // Total ng lahat ng books
        $statusPercentages = array_map(function ($count) use ($totalBooks) {
        return round(($count / $totalBooks) * 100, 2);  // Calculating percentage for each status
        }, $statusCounts);


        // Top 10 Borrowers
        $topBorrowers = DB::table('members')
        ->select('name', 'total_books_borrowed', 'library_card_no')
        ->orderByDesc('total_books_borrowed') // Order by the most books borrowed
        ->limit(10) // Only top 10 borrowers
        ->get();

        // Top 10 Borrowed Books
        $topBookBorroweds = DB::table('books')
        ->select('title', 'borrowed_times', 'accession_no')
        ->orderByDesc('borrowed_times') // Order by the most books borrowed
        ->limit(10) // Only top 10 borrowers
        ->get();


        return view('admin.reports')->with([
            'labels' => $labels,
            'values' => $values,
            'statusLabels' => $statusLabels,
            'statusCounts' => $statusCounts,
            'statusPercentages' => $statusPercentages,
            'topBorrowers' => $topBorrowers,
            'topBookBorroweds' => $topBookBorroweds
        ]);
        
    }
    

    public function showForgotPassword() {

        return view('forgotPasswordEmail');
    }
}
