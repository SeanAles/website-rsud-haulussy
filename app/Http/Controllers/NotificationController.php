<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getUnreadNotifications()
    {
        if (!Auth::check()) {
            return response()->json([
                'notifications' => [],
                'count' => 0
            ]);
        }

        $user = Auth::user();
        $notifications = $user->unreadNotifications;

        $formattedNotifications = $notifications->map(function ($notification) {
            return [
                'id' => $notification->id,
                'data' => $notification->data,
                'created_at' => $notification->created_at->toISOString()
            ];
        });

        return response()->json([
            'notifications' => $formattedNotifications,
            'count' => $notifications->count()
        ]);
    }

    public function markAsRead(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized']);
        }

        $user = Auth::user();

        if ($request->has('notification_id')) {
            $notification = $user->unreadNotifications->where('id', $request->notification_id)->first();
            if ($notification) {
                $notification->markAsRead();
            }
        } else {
            // Mark all as read
            $user->unreadNotifications->markAsRead();
        }

        return response()->json(['success' => true]);
    }
}
