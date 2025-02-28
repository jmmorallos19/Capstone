<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowAjaxController;
use App\Http\Controllers\ReturnAjaxController;
use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\BookCopyController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ResetPasswordController;


// Login/Main Pages Route
Route::get('/', [AdminController::class, 'showLogin'])->middleware('guest')->name('login');

// Forgot Password Pages Route
Route::get('/forgot-password', [AdminController::class , 'showForgotPassword'])->middleware('guest')->name('password.request');

// Password Reset Email
Route::post('/forgot-password', [ResetPasswordController::class, 'resetPasswordEmail'])->middleware('guest')->name('password.email');

// Reset Password Page
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showPasswordReset'])->middleware('guest')->name('password.reset');

// Password Reset Update
Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->middleware('guest')->name('password.update');

// Auth Route
Route::post('/login', [AuthController::class, 'auth_login'])->name('auth.login');
Route::post('/', [AuthController::class, 'auth_logout'])->name('auth.logout');

// Ajax Real-time data fetching
Route::post('/admin/realtime-get-borrow-data', [BorrowAjaxController::class, 'getDataBorrow'])->name('get.data.borrow');
Route::post('/admin/realtime-get-return-data', [ReturnAjaxController::class, 'getDataReturn'])->name('get.data.return');

// Auth Middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/books', [AdminController::class, 'showBook'])->name('admin.book');
    Route::get('/books/{book}', [AdminController::class, 'showBookEdit'])->name('admin.bookEdit');
    Route::get('/archives/{archive}/', [AdminController::class, 'showArchiveEdit'])->name('admin.showArchiveEdit');
    Route::get('/members', [AdminController::class, 'showMember'])->name('admin.member');
    Route::get('/members/{member}', [AdminController::class, 'showMemberEdit'])->name('admin.memberEdit');
    Route::get('/reports', [AdminController::class, 'showReport'])->name('admin.report');
    Route::get('/audit-log', [AdminController::class, 'showAuditLog'])->name('admin.auditLog');
    Route::get('/profile', [AdminController::class, 'showProfile'])->name('admin.profile');
    Route::get('/archives', [AdminController::class, 'showArchive'])->name('admin.archive');
    Route::get('/manage-account', [AdminController::class, 'showManageAccount'])->name('admin.manage.account');
    Route::get('/notifications', [AdminController::class, 'showNotification'])->name('admin.notification');
    Route::get('/notifications/{notification}', [NotificationController::class, 'showNotificationView'])->name('admin.notificationView');
    Route::get('/books/{book}/bookCopies/{bookCopy}/', [BookCopyController::class, 'showBookCopy'])->name('admin.bookCopy');
    Route::get('/staffs/{staff}', [UserAccountController::class, 'showStaff'])->name('showStaff');
    

    // Process
    Route::post('/add-book', [BookController::class, 'addBook'])->name('addBook'); 
    Route::post('/books/{book}/update-book', [BookController::class, 'updateBook'])->name('updateBook');
    Route::post('/books/{book}/add-new-copy', [BookCopyController::class, 'addBookCopy'])->name('addBookCopy');
    Route::post('/add-member', [MemberController::class, 'addMember'])->name('addMember');
    Route::post('/members/{member}/update-member-info', [MemberController::class, 'updateMemberInfo'])->name('updateMemberinfo');
    Route::post('/profile/profile-edit', [AdminController::class, 'profileEdit'])->name('profile-edit');
    Route::get('books/{book}/archive-book', [BookController::class, 'archiveBook'])->name('archiveBook');
    Route::get('books/{book}/restore-book', [BookController::class, 'restoreBook'])->name('restoreBook');
    Route::post('/borrow-book', [BookBorrowController::class, 'borrowBook'])->name('borrowBook');
    Route::post('/return-book', [BookReturnController::class, 'returnBook'])->name('returnBook');
    Route::post('/user/change-password', [ChangePasswordController::class, 'changePassword'])->name('changePassword');
    Route::get('/books/{book}/bookCopies/{bookCopy}/delete-bookCopy', [BookCopyController::class, 'deleteBookCopy'])->name('delete.book.copy');
    Route::post('/bookCopies/{bookCopy}/update-bookCopy', [BookCopyController::class, 'updateBookCopy'])->name('updateBookCopy');
    Route::post('/create-user-account', [UserAccountController::class, 'createUserAccount'])->name('createUserAccount');
    Route::put('/staffs/{staff}/inactive', [UserAccountController::class, 'inactiveUser'])->name('inactiveUser');
    Route::put('/staffs/{staff}/active', [UserAccountController::class, 'activeUser'])->name('activeUser');
    Route::get('/staffs/{staff}/delete', [UserAccountController::class, 'deleteUser'])->name('deleteUser');
    Route::put('/staffs/{staff}/update', [UserAccountController::class, 'updateStaffInfo'])->name('updateStaffInfo');
    Route::put('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('markAllAsRead');
});
