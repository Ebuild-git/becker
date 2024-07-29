<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.notifications');
    }

    public function getNotifications()
    {
        $notifications = Notification::where('is_read', false)->get();
        $total = $notifications->count();
        
        return response()->json([
            'total' => $total,
            'notifications' => $notifications
        ]);
    }

    public function markAsRead(Request $request)
    {
        $notificationIds = $request->input('notifications');
        
        Notification::whereIn('id', $notificationIds)->update(['is_read' => true]);

        $total = Notification::where('is_read', false)->count();
        
        return response()->json(['total' => $total]);
    }
}
