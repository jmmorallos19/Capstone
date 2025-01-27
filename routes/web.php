<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminNavigationController;
use App\Http\Controllers\StaticDataController;

// Pages Route
Route::get('/', [AdminNavigationController::class, 'showLogin'])->name('login');
Route::get('/admin/dashboard', [AdminNavigationController::class, 'showDashboard'])->name('admin.dashboard');
Route::get('/admin/books', [AdminNavigationController::class, 'showBook'])->name('admin.book');
Route::get('/admin/members', [AdminNavigationController::class, 'showMember'])->name('admin.member');
Route::get('/admin/books-report', [AdminNavigationController::class, 'showBooksReport'])->name('admin.bookReport');
Route::get('/admin/damaged-books', [AdminNavigationController::class, 'showDamagedBooks'])->name('admin.damagedBooks');
Route::get('/admin/members-report', [AdminNavigationController::class, 'showMemberReport'])->name('admin.memberReport');
Route::get('/admin/audit-log', [AdminNavigationController::class, 'showAuditLog'])->name('admin.auditLog');
Route::get('/admin/profile', [AdminNavigationController::class, 'showProfile'])->name('admin.profile');

Route::get('/admin/dashboard', [StaticDataController::class, 'staticDataDashboard'])->name('admin.dashboard');
Route::get('/admin/books', [StaticDataController::class, 'staticDataBooks'])->name('admin.book');