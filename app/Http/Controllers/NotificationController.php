<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    
    public function showNotificationView(Notification $notification){

        $notification->update([
            'is_read' => true,
        ]);

        $notification->with('user', 'book', 'bookCopy', 'member');

        return view('admin.notificationView')->with(['notification' => $notification]);
    }

    public function markAllAsRead(){
   

        if (Auth::user()->role === 'staff') {
            // Update all unread notifications for the staff user
            Notification::where('user_role', 'admin')
                        ->where('is_read', false) // Optional: If you only want to mark unread notifications
                        ->update(['is_read' => true]);
    
        }

        
        if (Auth::user()->role === 'admin') {
            // Update all unread notifications for the staff user
            Notification::where('user_role', 'staff')
                        ->where('is_read', false) // Optional: If you only want to mark unread notifications
                        ->update(['is_read' => true]);
    
        }
        
        return back()->with(['success' => 'All notifications have been successfully marked as read.']);
    }

}
